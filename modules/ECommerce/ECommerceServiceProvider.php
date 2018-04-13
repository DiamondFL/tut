<?php

namespace ECommerce\Providers;

use Illuminate\Support\ServiceProvider;

class ECommerceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/database');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'eco');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
