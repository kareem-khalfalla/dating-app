<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ChatListComponent extends Component
{
    public $users;
    public $search = '';
    
    public function updatedSearch()
    {
        $this->users = User::allExceptAuthName($this->search)->get();
    }

    public function render(): View
    {
        return view('livewire.chat-list-component');
    }
}
