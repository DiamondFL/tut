<?php

namespace Istruct;

use Istruct\Console\Commands\ForceDBCommand;
use Istruct\Facades\CheckFun;
use Istruct\Facades\CurlFun;
use Istruct\Facades\DBFun;
use Istruct\Facades\FormatFun;
use Istruct\Facades\InputFun;
use Istruct\Facades\MenuFun;
use Istruct\Facades\UploadFun;
use Illuminate\Support\ServiceProvider;

class ForceDBServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'magic');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->publishes([
            __DIR__ . '/config/magic-db.php' => config_path('magic-db.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ForceDBCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CheckFa', CheckFun::class);
        $this->app->bind('CurlFa', CurlFun::class);
        $this->app->bind('DBFa', DBFun::class);
        $this->app->bind('FormatFa', FormatFun::class);
        $this->app->bind('InputFa', InputFun::class);
        $this->app->bind('MenuFa', MenuFun::class);
        $this->app->bind('UploadFa', UploadFun::class);
    }
}
