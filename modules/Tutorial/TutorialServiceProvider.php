<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MiniTest\Repositories\MiniResultRepository;
use MiniTest\Repositories\MiniResultRepositoryEloquent;
use MiniTest\Repositories\MiniTestRepository;
use MiniTest\Repositories\MiniTestRepositoryEloquent;
use Tutorial\Repositories\LessonRepository;
use Tutorial\Repositories\LessonRepositoryEloquent;

class TutorialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LessonRepository::class, LessonRepositoryEloquent::class);
        $this->app->bind(MiniTestRepository::class, MiniTestRepositoryEloquent::class);
        $this->app->bind(MiniResultRepository::class, MiniResultRepositoryEloquent::class);
    }
}
