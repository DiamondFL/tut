<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 10:34 AM
 */

namespace Ush;

use Illuminate\Support\ServiceProvider;
use Ush\Http\ViewComposers\CategoryComposer;
use Ush\Repositories\UshCategoryRepository;
use Ush\Repositories\UshCategoryRepositoryEloquent;
use Ush\Repositories\UshGroupRepository;
use Ush\Repositories\UshGroupRepositoryEloquent;
use Ush\Repositories\UshSubCategoryRepository;
use Ush\Repositories\UshSubCategoryRepositoryEloquent;

class UshServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'ush');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'ush');
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
        view()->composer([
            'ush::ushroduct.create', 'ush::ushroduct.update'
        ], CategoryComposer::class);

        view()->composer([
            'ush::ushroduct.create', 'ush::ushroduct.update'
        ], GroupComposer::class);

    }

    public function register()
    {
        $this->app->bind(UshGroupRepository::class, UshGroupRepositoryEloquent::class);
        $this->app->bind(UshCategoryRepository::class, UshCategoryRepositoryEloquent::class);
        $this->app->bind(UshSubCategoryRepository::class, UshSubCategoryRepositoryEloquent::class);
    }
}