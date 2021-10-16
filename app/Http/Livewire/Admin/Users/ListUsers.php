<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;

class ListUsers extends Component
{
    public $userId;

    protected $listeners = [
        'destroy',
    ];

    public function render()
    {
        return view('livewire.admin.users.list-users', [
            'users' => User::with('profile')->allExceptAuthId()->latest()->paginate()
        ]);
    }

    public function openChat(int $userId)
    {
        if (Message::where('from', $userId)->orWhere('to', $userId)->count() > 0) {
            return redirect()->route('admin.user.chat', $userId);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'title' => __('alerts.This user has no chat!')
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
