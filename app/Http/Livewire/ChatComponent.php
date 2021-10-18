<?php

namespace App\Http\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChatComponent extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'echo:messages,MessageEvent' => 'received',
        'loadMore',
    ];

    public $user;
    public $users;
    public $selectedUser;
    public $search = '';
    public $isOnline;
    public $messages;
    public $message;
    public $messagesCount;
    public $loadAmount = 5;
    public $file;
    public $fileName;

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function mount(User $user): void
    {
        if (is_null($user->id)) {
            $user = auth()->user();
            $this->user = $user;
        }

        if (User::friendsByLastMsg($user)->count() > 0){
            $this->users = User::friendsByLastMsg($user)->get();
        }else{
            $messageUsersIds= Message::where('from', $user->id)->orWhere('to', $user->id)->get()->pluck('to')->unique();
            if (in_array($user->id, $messageUsersIds->toArray())){
                foreach ($messageUsersIds as $key => $value) {
                    if ($value == $user->id){
                        unset($messageUsersIds[$key]);
                    }
                }
            }
            $this->users = User::whereIn('id', $messageUsersIds)->get();
        }
        $this->selectedUser = $this->users[0]->toArray();
        $this->messages = [];

        /** @var \Illuminate\Routing\Router $router */
        $router = app('router');
        /** @var \Illuminate\Http\Request $request */
        $request = app('request');
        if (
            $router->getRoutes()->match($request->create(url()->previous()))->getName() == 'profile'
            && $router->getRoutes()->match($request->create(url()->previous()))->user !== auth()->user()->id
        ) {
            // $user = $router->getRoutes()->match($request->create(url()->previous()))->user;
            $this->selectedUser = $this->users->first()->toArray();
        }
    }

    public function updatedSearch(): void
    {
        $this->users = User::friendsByLastMsg($this->user, $this->search)->get();
    }

    public function userSelected(array $user): void
    {
        $this->selectedUser = $user;
        $this->isOnline = User::find($this->selectedUser['id'])->isOnline();
        $this->messages = array_reverse(Message::betweenTwoUsers($this->selectedUser['id'], $this->user->id)->limit(5)->latest()->get()->toArray());
        $this->messagesCount = Message::betweenTwoUsers($this->selectedUser['id'], $this->user->id)->count();
        $this->emit('scrollToBottom');
    }

    public function loadMore(): void
    {
        if ($this->loadAmount <= count($this->messages)) {
            $this->loadAmount += 5;
        }

        $this->messages = array_reverse(Message::betweenTwoUsers($this->selectedUser['id'], $this->user->id)->limit($this->loadAmount)->latest()->get()->toArray());
    }

    public function saveFile(): void
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $this->file;
        $fileName = $file->store('images/users-attachments');
        $this->fileName = $fileName;
    }

    public function addMessage(): void
    {
        if ($this->file) {
            $this->saveFile();
        }

        if ($this->fileName) {
            $this->message = $this->fileName;
        }

        if (!$this->message) {
            return;
        }

        $message = Message::create([
            'from' => auth()->id(),
            'to' => $this->selectedUser['id'],
            'content' => $this->message,
            // 'is_seen' => '',
            'url' => $this->fileName ?? '',
        ]);

        $this->message = null;
        $this->file = null;
        $this->fileName = null;

        User::find($message->from)->update([
            'last_message_at' => now(),
        ]);

        User::find($message->to)->update([
            'last_message_at' => now(),
        ]);

        Message::where('to', auth()->id())->update(['is_seen' => 1]);

        $this->users = User::friendsByLastMsg($this->user)->get();

        $this->emit('userReceivedMsg', [
            'user' => User::find($message->from)->toArray()
        ]);

        event(new MessageEvent($message));
    }

    public function received($data): void
    {
        $messageArr = $data['message'];

        $this->messages[] = $messageArr;

        $user = $messageArr['from'] == auth()->id()
            ? User::find($messageArr['to'])->toArray()
            : User::find($messageArr['from'])->toArray();

        $this->userSelected($user);

        $this->emit('scrollToBottom');

        $this->users = User::friendsByLastMsg($this->user)->get();

        $this->selectedUser = $user;

        $this->message = '';
    }

    public function block(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        // $authUser->blockFriend(User::find($id));
    }
}
