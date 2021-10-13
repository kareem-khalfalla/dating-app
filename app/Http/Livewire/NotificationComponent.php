<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $notifications;

    protected $listeners = [
        'updateNotifications'
    ];

    public function render()
    {
        return view('livewire.notification-component');
    }

    public function updateNotifications(): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->unreadNotifications->markAsRead();
    }
}
