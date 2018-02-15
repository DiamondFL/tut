<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/25/18
 * Time: 3:09 PM
 */

namespace DocPros;

use DocPros\Http\ViewComposers\TagComposer;
use DocPros\Repositories\DocExampleRepository;
use DocPros\Repositories\DocExampleRepositoryEloquent;
use DocPros\Repositories\DocExampleTagRepository;
use DocPros\Repositories\DocExampleTagRepositoryEloquent;
use DocPros\Repositories\DocLanguageRepository;
use DocPros\Repositories\DocLanguageRepositoryEloquent;
use DocPros\Repositories\DocPackageRepository;
use DocPros\Repositories\DocPackageRepositoryEloquent;
use DocPros\Repositories\DocProjectRepository;
use DocPros\Repositories\DocProjectRepositoryEloquent;
use DocPros\Repositories\DocTagRepository;
use DocPros\Repositories\DocTagRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class DocProsServiceProvider extends ServiceProvider
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
        $this->app->bind(DocProjectRepository::class, DocProjectRepositoryEloquent::class);
        $this->app->bind(DocPackageRepository::class, DocPackageRepositoryEloquent::class);
        $this->app->bind(DocTagRepository::class, DocTagRepositoryEloquent::class);
        $this->app->bind(DocExampleRepository::class, DocExampleRepositoryEloquent::class);
        $this->app->bind(DocLanguageRepository::class, DocLanguageRepositoryEloquent::class);
        $this->app->bind(DocExampleTagRepository::class, DocExampleTagRepositoryEloquent::class);
    }
}