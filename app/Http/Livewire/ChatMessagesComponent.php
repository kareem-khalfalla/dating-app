<?php

namespace App\Http\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Pusher\Pusher;

class ChatMessagesComponent extends Component
{
    public $user;
    public $isOnline;
    public $messages;
    public $messagesCount;
    public $message;

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

    public function addMessage()
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $this->user['id'],
            'content' => $this->message,
            // 'is_seen' => '',
            // 'url' => '',
        ]);

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
