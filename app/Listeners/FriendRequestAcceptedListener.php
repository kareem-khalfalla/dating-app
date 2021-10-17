<?php

namespace App\Listeners;

use App\Events\FriendRequestSentEvent;
use App\Notifications\FriendRequestAcceptedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendRequestAcceptedListener
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
        $event->acceptedUser->notify(new FriendRequestAcceptedNotification($event->user));
    }
}
