<?php

namespace App\Listeners;

use App\Events\FriendRequestSentEvent;
use App\Notifications\FriendRequestSentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendRequestSentListener
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
     * @param  FriendRequestSentEvent  $event
     * @return void
     */
    public function handle(FriendRequestSentEvent $event)
    {
        $event->acceptedUser->notify(new FriendRequestSentNotification($event->user));
    }
}
