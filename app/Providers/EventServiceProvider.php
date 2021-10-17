<?php

namespace App\Providers;

use App\Events\FriendRequestAcceptedEvent;
use App\Events\FriendRequestDeniedEvent;
use App\Events\FriendRequestSentEvent;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],

        Login::class => [
            \App\Listeners\LogSuccessfulLogin::class,
        ],

        FriendRequestDeniedEvent::class => [
            \App\Listeners\SendNotification::class
        ],

        FriendRequestSentEvent::class => [
            \App\Listeners\FriendRequestSentListener::class
        ],

        FriendRequestAcceptedEvent::class => [
            \App\Listeners\FriendRequestAcceptedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
