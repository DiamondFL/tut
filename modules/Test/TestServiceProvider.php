<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:17 PM
 */

namespace Test;

use Illuminate\Support\ServiceProvider;
use Test\Repositories\RgAnswerRepository;
use Test\Repositories\RgAnswerRepositoryEloquent;
use Test\Repositories\RgQuestionRepository;
use Test\Repositories\RgQuestionRepositoryEloquent;
use Test\Repositories\RgReplyRepository;
use Test\Repositories\RgReplyRepositoryEloquent;
use Test\Repositories\RgResultRepository;
use Test\Repositories\RgResultRepositoryEloquent;
use Test\Repositories\RgTestRepository;
use Test\Repositories\RgTestRepositoryEloquent;

class TestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'trg');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->publishes([
            __DIR__.'/config/magic-db.php' => config_path('magic-db.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
//                ForceDBCommand::class
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
        $this->app->bind(RgAnswerRepository::class, RgAnswerRepositoryEloquent::class);
        $this->app->bind(RgQuestionRepository::class, RgQuestionRepositoryEloquent::class);
        $this->app->bind(RgReplyRepository::class, RgReplyRepositoryEloquent::class);
        $this->app->bind(RgResultRepository::class, RgResultRepositoryEloquent::class);
        $this->app->bind(RgTestRepository::class, RgTestRepositoryEloquent::class);
    }
}