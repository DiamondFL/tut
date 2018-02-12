<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 1/15/2018
 * Time: 8:20 PM
 */
namespace IoAccess;
use Illuminate\Support\ServiceProvider;
use IoAccess\Facades\AccessFun;

class IoAccessServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'trg');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->publishes([
//            __DIR__.'/config/magic-db.php' => config_path('magic-db.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
//              ForceDBCommand::class
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('AccessFa', AccessFun::class);
    }
}