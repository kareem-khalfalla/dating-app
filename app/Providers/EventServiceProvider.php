<?php

namespace App\Providers;

use App\Events\MessageRequestEvent;
use App\Events\MessageRequestRefusedEvent;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
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
            // \App\Listeners\SendEmailVerificationListener::class,
        ],

        MessageRequestEvent::class => [
            \App\Listeners\SendMessageRequestListener::class,
        ],

        MessageRequestRefusedEvent::class => [
            \App\Listeners\SendMessageRequestRefusedListener::class,
        ],

        Login::class => [
            \App\Listeners\LogSuccessfulLogin::class,
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
