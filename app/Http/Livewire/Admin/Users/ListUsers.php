<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'users' => User::paginate()
        ])->layout('layouts.admin');
    }
}
