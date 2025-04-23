<?php

namespace App\Providers;

use App\Models\Item;
use App\Observers\ItemObserver;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

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
        Notification::extend('cache', function ($app) {
            return new \App\Channels\CacheChannel();
        });

        Item::observe(ItemObserver::class);
    }
}
