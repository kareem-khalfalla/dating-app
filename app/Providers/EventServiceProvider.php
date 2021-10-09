<?php

namespace App\Providers;

use App\Events\FriendRequestDenied;
use App\Events\MessageRequestEvent;
use App\Events\MessageRequestRefusedEvent;
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

        FriendRequestDenied::class => [
            \App\Listeners\SendNotification::class
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
