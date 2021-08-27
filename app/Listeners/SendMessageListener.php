<?php

namespace App\Listeners;

use App\Notifications\MessageNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageListener
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
        $event->user->notify(new MessageNotification($event->user));
    }
}
