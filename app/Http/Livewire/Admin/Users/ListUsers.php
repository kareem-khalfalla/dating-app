<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    protected $listeners = [
        'destroy'
    ];

    public $userId;

    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'users' => User::allExceptAuthId()->latest()->paginate()
        ])->layout('layouts.admin');
    }

    public function confirm(int $userId): void
    {
        $this->userId = $userId;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function destroy(): void
    {
        User::find($this->userId)->delete();

        $this->dispatchBrowserEvent('deleted', [
            'message' => 'User deleted successfully'
        ]);
    }
}
