<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ChatListComponent extends Component
{
    protected $listeners = [
        'receivedMessage',
    ];

    public $users;
    public $userId;
    public $search = '';
    
    public function updatedSearch(): void
    {
        $this->users = User::allExceptAuthName($this->search)->get();
    }

    public function render(): View
    {
        return view('livewire.chat-list-component');
    }

    public function receivedMessage(int $id): void
    {
        $this->userId = $id;
    }
}
