<?php

namespace App\Providers;

use App\Services\IceAndFire\IceAndFireService;
use Illuminate\Support\ServiceProvider;

class IceAndFireProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            IceAndFireService::class,
            fn () => new IceAndFireService(
                config('services.iceandfire.uri')
            )
            );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
