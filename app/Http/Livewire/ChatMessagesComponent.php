<?php

namespace App\Http\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChatMessagesComponent extends Component
{
    use WithFileUploads;

    public $user;
    public $isOnline;
    public $messages;
    public $messagesCount;
    public $message;
    public $file;
    public $fileName;

    public $latest;

    protected $listeners = [
        'userSelected',
        'echo:messages,MessageEvent' => 'done',
    ];

    public function mount()
    {
        $this->messages = [];
    }

    public function render()
    {
        return view('livewire.chat-messages-component');
    }

    public function userSelected($user)
    {
        $this->user = $user;
        $this->isOnline = User::find($this->user['id'])->isOnline();
        $this->messages = Message::betweenTwoUsers($this->user['id'])->get()->toArray();
        $this->messagesCount = Message::betweenTwoUsers($this->user['id'])->get()->count() * 2;
        $this->emit('scrollToBottom');
    }

    public function saveFile()
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $this->file;
        $fileName = $file->store('images/users-attachments');
        $this->fileName = $fileName;
    }

    public function addMessage()
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
            'to' => $this->user['id'],
            'content' => $this->message,
            // 'is_seen' => '',
            'url' => $this->fileName ?? '',
        ]);

        $this->file = null;
        $this->fileName = null;
        $this->message = null;

        event(new MessageEvent($message));
    }

    public function done($data)
    {
        $messageArr = $data['message'];

        $this->messages[] = $messageArr;

        $this->emit('scrollToBottom');

        $this->message = '';
    }
}
