<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:17 PM
 */

namespace Test\Rg;

use Illuminate\Support\ServiceProvider;
use Test\Rg\Repositories\RgAnswerRepository;
use Test\Rg\Repositories\RgAnswerRepositoryEloquent;
use Test\Rg\Repositories\RgQuestionRepository;
use Test\Rg\Repositories\RgQuestionRepositoryEloquent;
use Test\Rg\Repositories\RgReplyRepository;
use Test\Rg\Repositories\RgReplyRepositoryEloquent;
use Test\Rg\Repositories\RgResultRepository;
use Test\Rg\Repositories\RgResultRepositoryEloquent;
use Test\Rg\Repositories\RgTestRepository;
use Test\Rg\Repositories\RgTestRepositoryEloquent;

class TestRgServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'trg');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->publishes([
//            __DIR__.'/config/magic-db.php' => config_path('magic-db.php'),
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