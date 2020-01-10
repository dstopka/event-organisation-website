<?php

namespace App\Providers;

use App\Event;
use App\EventDate;
use App\Policies\EventDatePolicy;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Event::class => EventPolicy::class,
        EventDate::class => EventDatePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('events', 'App\Policies\EventPolicy');
        Gate::resource('event_date', 'App\Policies\EventDatePolicy');
    }
}
