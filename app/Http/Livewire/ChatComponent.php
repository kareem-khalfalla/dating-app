<?php

namespace App\Http\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class ChatComponent extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'echo:messages,MessageEvent' => 'received',
        'loadMore',
        'destroy',
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
    public $blockedId = 5;
    public $isBlockedUser = false;
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

        $this->renderUsers();

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
        if ($user['id'] != auth()->id() && Message::latest()->limit(1)->from != auth()->id()) {
            Message::betweenTwoUsers($this->selectedUser['id'], $this->user->id)->get()->map(fn ($item) => $item->update(['is_seen' => 1]));
        }
         
        if (
            User::find($user['id'])->isBlockedBy(auth()->user())
            || auth()->user()->isBlockedBy(User::find($user['id']))
            ){
            $this->isBlockedUser = true;
        }else{
            $this->isBlockedUser = false;
        }
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

        $this->renderUsers();
        if ($this->isBlockedUser){
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

        $this->renderUsers();

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

        $this->renderUsers();

        $this->selectedUser = $user;

        $this->message = '';
    }

    public function confirm(int $id): void
    {
        $this->blockedId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => __('alerts.Are you sure?'),
            'type'  => 'warning',
        ]);
    }

    /**
     * Block user.
     */
    public function destroy(): Redirector
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->blockFriend(User::find($this->blockedId));
        return redirect(request()->header('Referer'));
    }

    private function renderUsers(): void
    {
        $this->users = User::friendsByLastMsg($this->user)->get();

        $messageUsersIds =
            Message::where('to', $this->user->id)->pluck('from')->unique()->toArray() +
            Message::where('from', $this->user->id)->pluck('to')->unique()->toArray();


        if (in_array($this->user->id, $messageUsersIds)) {
            foreach ($messageUsersIds as $key => $value) {
                if ($value == $this->user->id) {
                    unset($messageUsersIds[$key]);
                }
            }
        }

        $blockedUsersRecipientIds = $this->user->getBlockedFriendships()->pluck('recipient_id')->toArray();
        $blockedUsersSenderIds = $this->user->getBlockedFriendships()->pluck('sender_id')->toArray();
        foreach (array_merge($blockedUsersRecipientIds, $blockedUsersSenderIds) as $blockedUserKey => $blockedUserVal) {
            if (in_array($blockedUserVal, $messageUsersIds)) {
                // unset($messageUsersIds[$blockedUserKey]);
                $this->isBlockedUser = true;
            }
        }

        $this->users = $this->users->merge(User::whereIn('id', $messageUsersIds)->get());
    }
}
