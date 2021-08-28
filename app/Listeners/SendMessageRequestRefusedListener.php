<?php

namespace App\Listeners;

use App\Events\MessageRequestRefusedEvent;
use App\Models\User;
use App\Notifications\MessageRequestRefusedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class SendMessageRequestRefusedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageRequestRefusedEvent  $event
     * @return void
     */
    public function handle(MessageRequestRefusedEvent $event)
    {
        /** @var \App\Models\User $user */
        $user = $event->user;
        $user->notify(new MessageRequestRefusedNotification(Auth::user()));
    }
}
