<?php

namespace App\Providers;

use App\Models\News;
use App\Models\MultiChoice;
use App\Models\Question;
use App\Models\Score;
use App\Models\Subject;
use App\Models\Tag;
use App\Policies\MultiChoicePolicy;
use App\Policies\NewsPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\ScorePolicy;
use App\Policies\SubjectPolicy;
use App\Policies\TagPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        News::class => NewsPolicy::class,
        Tag::class => TagPolicy::class,
        Question::class => QuestionPolicy::class,
        MultiChoice::class => MultiChoicePolicy::class,
        Score::class => ScorePolicy::class,
        Subject::class => SubjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('scores', 'ScorePolicy');
    }
}
