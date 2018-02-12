<?php

namespace App\Providers;


use App\Repositories\MultiChoiceRepository;
use App\Repositories\MultiChoiceRepositoryEloquent;
use App\Repositories\NewsRepository;
use App\Repositories\NewsRepositoryEloquent;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryEloquent;
use App\Repositories\QuestionRepository;
use App\Repositories\QuestionRepositoryEloquent;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use App\Repositories\ScoreRepository;
use App\Repositories\ScoreRepositoryEloquent;
use App\Repositories\SubjectRepository;
use App\Repositories\SubjectRepositoryEloquent;
use App\Repositories\TagRepository;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\VocabularyRepository;
use App\Repositories\VocabularyRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(QuestionRepository::class, QuestionRepositoryEloquent::class);
        $this->app->bind(MultiChoiceRepository::class, MultiChoiceRepositoryEloquent::class);
        $this->app->bind(NewsRepository::class, NewsRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        $this->app->bind(ScoreRepository::class, ScoreRepositoryEloquent::class);
        $this->app->bind(SubjectRepository::class, SubjectRepositoryEloquent::class);
        $this->app->bind(TagRepository::class, TagRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(VocabularyRepository::class, VocabularyRepositoryEloquent::class);
    }
}
