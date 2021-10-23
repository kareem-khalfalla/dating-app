<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class NotificationComponent extends Component
{
    public $loadAmount = 7;
    public $notificationsCount;

    protected $listeners = [
        'updateNotifications'
    ];

    public function mount()
    {
        $this->notificationsCount = count(auth()->user()->notifications);
    }

    public function render(): View
    {
        return view('livewire.notification-component', [
            'notifications' => auth()->user()->notifications->take($this->loadAmount)
        ]);
    }

    public function loadMore()
    {
        if ($this->notificationsCount < $this->loadAmount) {
            return;
        }
        $this->loadAmount += 7;
    }

    public function updateNotifications(): void
    {
        /** @var \App\Models\User $authUser */
        $authUser = auth()->user();
        $authUser->unreadNotifications->markAsRead();
    }
}
