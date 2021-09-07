<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\MessageRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageRequestListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewMessageEvent  $event
     * @return void
     */
    public function handle($event)
    {
        /** @var \App\Models\User $user */
        $user = $event->user;
        $user->notify(new MessageRequestNotification($user));
    }
}
