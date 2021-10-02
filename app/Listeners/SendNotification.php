<?php

namespace App\Listeners;

use App\Events\FriendRequestDenied;
use App\Notifications\FriendRequestDeniedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification
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
     * @param  FriendRequestDenied  $event
     * @return void
     */
    public function handle(FriendRequestDenied $event)
    {
        $event->deniedUser->notify(new FriendRequestDeniedNotification($event->user));
    }
}
