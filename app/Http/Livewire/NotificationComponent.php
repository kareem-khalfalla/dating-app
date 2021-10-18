<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class NotificationComponent extends Component
{
    public $loadAmount = 5;
    public $notifications;

    protected $listeners = [
        'updateNotifications'
    ];

    public function render(): View
    {
        return view('livewire.notification-component');
    }

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function loadMore(): void
    {
        $this->loadAmount += 5;
    }

    public function updateNotifications(): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->unreadNotifications->markAsRead();
    }
}
