<?php

namespace App\Providers;

use App\confrm;
use Illuminate\Auth\Events\Registered;
use App\Observers\UuidObserver;
use App\confrs;
use App\huremp;
use App\secusr;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function registerUuidObservers()
    {
        confrs::observe(app(UuidObserver::class));
        confrm::observe(app(UuidObserver::class));
        huremp::observe(app(UuidObserver::class));
        secusr::observe(app(UuidObserver::class));
    }
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->registerUuidObservers();
    }
}
