<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\UpdateObserver;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \App\Models\User::observe(UpdateObserver::class);
        \App\Models\Role::observe(UpdateObserver::class);
        \App\Models\PayMethod::observe(UpdateObserver::class);
        \App\Models\TaxClassification::observe(UpdateObserver::class);
        \App\Models\Client::observe(UpdateObserver::class);
        \App\Models\PersonType::observe(UpdateObserver::class);
        \App\Models\Order::observe(UpdateObserver::class);
        \App\Models\Vehicle::observe(UpdateObserver::class);


        \App\Models\Order::observe(\App\Observers\OrderObserver::class);

        Paginator::useBootstrap();
    }
}
