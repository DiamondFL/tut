<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 10:34 AM
 */

namespace Organization;

use Illuminate\Support\ServiceProvider;
use Organization\Http\ViewComposers\CategoryComposer;
use Organization\Http\ViewComposers\GroupComposer;
use Organization\Repositories\CategoryRepository;
use Organization\Repositories\CategoryRepositoryEloquent;
use Organization\Repositories\GroupRepository;
use Organization\Repositories\GroupRepositoryEloquent;

class OrganizationServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'organ');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'organ');
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
            'doc::doc-lesson.create', 'doc::doc-lesson.update',
        ], CategoryComposer::class);

        view()->composer([
            'doc::doc-lesson.create',
        ], CategoryComposer::class);

        view()->composer([

        ], GroupComposer::class);
    }

    public function register()
    {
        $this->app->bind(GroupRepository::class, GroupRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
    }
}