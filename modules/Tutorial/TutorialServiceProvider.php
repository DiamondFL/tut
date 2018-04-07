<?php

namespace Tutorial\Providers;

use Illuminate\Support\ServiceProvider;
use Tutorial\Http\ViewComposers\TutorialComposer;
use Tutorial\Repositories\LessonCommentRepository;
use Tutorial\Repositories\LessonCommentRepositoryEloquent;
use Tutorial\Repositories\LessonFeedBackRepository;
use Tutorial\Repositories\LessonFeedBackRepositoryEloquent;
use Tutorial\Repositories\LessonRepository;
use Tutorial\Repositories\LessonRepositoryEloquent;
use Tutorial\Repositories\LessonResultRepository;
use Tutorial\Repositories\LessonResultRepositoryEloquent;
use Tutorial\Repositories\LessonSubCommentRepository;
use Tutorial\Repositories\LessonSubCommentRepositoryEloquent;
use Tutorial\Repositories\LessonTestRepository;
use Tutorial\Repositories\LessonTestRepositoryEloquent;
use Tutorial\Repositories\SectionRepository;
use Tutorial\Repositories\SectionRepositoryEloquent;
use Tutorial\Repositories\SectionResultRepository;
use Tutorial\Repositories\SectionResultRepositoryEloquent;
use Tutorial\Repositories\SectionTestRepository;
use Tutorial\Repositories\SectionTestRepositoryEloquent;
use Tutorial\Repositories\TutorialRepository;
use Tutorial\Repositories\TutorialRepositoryEloquent;
use Tutorial\Repositories\TutorialResultRepository;
use Tutorial\Repositories\TutorialResultRepositoryEloquent;
use Tutorial\Repositories\TutorialTestRepository;
use Tutorial\Repositories\TutorialTestRepositoryEloquent;

class TutorialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'tut');
        $this->loadJsonTranslationsFrom(__DIR__ . '/resources/lang');

        view()->composer([
            'tut::section.index',
            'tut::section.create',
            'tut::section.update',
            'tut::lesson.create',
            'tut::lesson.update',
            'tut::lesson-test.index',
            'tut::lesson-test.create',
            'tut::lesson-test.update',
            'tut::lesson-result.index',
            'tut::lesson-result.create',
            'tut::lesson-result.update',
            'tut::tutorial-result.index',
            'tut::tutorial-result.update',
        ], TutorialComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TutorialRepository::class, TutorialRepositoryEloquent::class);
        $this->app->bind(TutorialResultRepository::class, TutorialResultRepositoryEloquent::class);
        $this->app->bind(TutorialTestRepository::class, TutorialTestRepositoryEloquent::class);

        $this->app->bind(SectionRepository::class, SectionRepositoryEloquent::class);
        $this->app->bind(SectionTestRepository::class, SectionTestRepositoryEloquent::class);
        $this->app->bind(SectionResultRepository::class, SectionResultRepositoryEloquent::class);

        $this->app->bind(LessonTestRepository::class, LessonTestRepositoryEloquent::class);
        $this->app->bind(LessonCommentRepository::class, LessonCommentRepositoryEloquent::class);
        $this->app->bind(LessonFeedBackRepository::class, LessonFeedBackRepositoryEloquent::class);
        $this->app->bind(LessonRepository::class, LessonRepositoryEloquent::class);
        $this->app->bind(LessonSubCommentRepository::class, LessonSubCommentRepositoryEloquent::class);
        $this->app->bind(LessonResultRepository::class, LessonResultRepositoryEloquent::class);
    }
}
