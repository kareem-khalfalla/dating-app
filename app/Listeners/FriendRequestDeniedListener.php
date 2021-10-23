<?php

namespace App\Listeners;

use App\Events\FriendRequestDeniedEvent;
use App\Notifications\FriendRequestDeniedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendRequestDeniedListener
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
     * @param  FriendRequestDeniedEvent  $event
     * @return void
     */
    public function handle(FriendRequestDeniedEvent $event)
    {
        $event->deniedUser->notify(new FriendRequestDeniedNotification($event->user));
    }
}
