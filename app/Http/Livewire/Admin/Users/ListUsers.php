<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ListUsers extends Component
{
    protected $listeners = [
        'destroy',
    ];

    public $userId;

    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'users' => User::allExceptAuthId()->latest()->paginate()
        ]);
    }

    public function confirm(int $userId): void
    {
        $this->userId = $userId;

        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => __('alerts.Are you sure?'),
            'text'  => __('alerts.You won\'t be able to revert this!'),
            'type'  => 'warning',
        ]);
    }

    public function destroy(): void
    {
        User::find($this->userId)->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'title' => __('alerts.User deleted successfully')
        ]);
    }

    public function updateRole(int $userId, string $role): void
    {
        Validator::make(['role' => $role], [
            'role' => ['required', Rule::in(['user', 'super user', 'admin', 'moderator',])]
        ])->validate();

        User::find($userId)->update([
            'role' => $role
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => __("alerts.Role changed to $role successfully"),
            'timer' => 2000,
            'text' => '',
        ]);
    }
}
