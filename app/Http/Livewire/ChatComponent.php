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

    public function render()
    {
        return view('livewire.chat-component');
    }

    protected $listeners = [
        'echo:messages,MessageEvent' => 'received',
        'loadMore',
    ];

    public $users;
    public $selectedUser;
    public $search = '';
    public $isOnline;
    public $messages;
    public $message;
    public $messagesCount;
    public $loadAmount = 10;
    public $file;
    public $fileName;

    public function mount()
    {
        $this->users = User::allExceptAuthId($this->search)->orderByLastMsg()->get();
        $this->selectedUser = $this->users[0]->toArray();
        $this->messages = [];
    }

    public function updatedSearch(): void
    {
        // $this->users = User::allExceptAuthName($this->search)->get();
    }

    public function userSelected(array $user): void
    {
        $this->selectedUser = $user;
        $this->isOnline = User::find($this->selectedUser['id'])->isOnline();
        $this->messages = Message::betweenTwoUsers($this->selectedUser['id'])->latest()->limit($this->loadAmount)->get()->toArray();
        $this->messagesCount = Message::betweenTwoUsers($this->selectedUser['id'])->count();
        $this->emit('scrollToBottom');
    }

    public function loadMore()
    {
        $this->loadAmount += 10;
        $this->messages = Message::betweenTwoUsers($this->selectedUser['id'])->limit($this->loadAmount)->get()->toArray();
        $this->emit('load', $this->loadAmount); // testing
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

        User::find($message->from)->update([
            'last_message_at' => now()
        ]);

        $this->users = User::allExceptAuthId($this->search)->orderByLastMsg()->get();

        $this->message = null;
        $this->file = null;
        $this->fileName = null;

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

        $this->users = User::allExceptAuthId($this->search)->orderByLastMsg()->get();

        $this->selectedUser = $user;

        $this->message = '';
    }

    public function block(int $id): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->blockFriend(User::find($id));
    }
}