<?php

namespace MiniTest\Providers;

use Illuminate\Support\ServiceProvider;
use MiniTest\Repositories\MiniResultRepository;
use MiniTest\Repositories\MiniResultRepositoryEloquent;
use MiniTest\Repositories\MiniTestRepository;
use MiniTest\Repositories\MiniTestRepositoryEloquent;

class MiniTestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->loadMigrationsFrom(__DIR__ . '/database');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'mini-test');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MiniTestRepository::class, MiniTestRepositoryEloquent::class);
        $this->app->bind(MiniResultRepository::class, MiniResultRepositoryEloquent::class);
    }
}
