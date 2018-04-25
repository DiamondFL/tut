<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/25/18
 * Time: 3:09 PM
 */

namespace Docs;

use Docs\Http\ViewComposers\TagComposer;
use Docs\Repositories\DocExampleRepository;
use Docs\Repositories\DocExampleRepositoryEloquent;
use Docs\Repositories\DocExampleTagRepository;
use Docs\Repositories\DocExampleTagRepositoryEloquent;
use Docs\Repositories\DocLanguageRepository;
use Docs\Repositories\DocLanguageRepositoryEloquent;
use Docs\Repositories\DocLessonRepository;
use Docs\Repositories\DocLessonRepositoryEloquent;
use Docs\Repositories\DocPackageRepository;
use Docs\Repositories\DocPackageRepositoryEloquent;
use Docs\Repositories\DocProjectRepository;
use Docs\Repositories\DocProjectRepositoryEloquent;
use Docs\Repositories\DocTagRepository;
use Docs\Repositories\DocTagRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class DocsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'doc');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'doc');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        view()->composer([
            'doc::doc-example.create',
            'doc::doc-example.update'
        ], TagComposer::class);
    }

    public function register()
    {
        $this->app->bind(DocExampleRepository::class, DocExampleRepositoryEloquent::class);
        $this->app->bind(DocExampleTagRepository::class, DocExampleTagRepositoryEloquent::class);
        $this->app->bind(DocLanguageRepository::class, DocLanguageRepositoryEloquent::class);
        $this->app->bind(DocLessonRepository::class, DocLessonRepositoryEloquent::class);
        $this->app->bind(DocProjectRepository::class, DocProjectRepositoryEloquent::class);
        $this->app->bind(DocPackageRepository::class, DocPackageRepositoryEloquent::class);
        $this->app->bind(DocTagRepository::class, DocTagRepositoryEloquent::class);
    }
}