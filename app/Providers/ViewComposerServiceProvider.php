<?php

namespace App\Providers;

use App\Http\ViewComposers\PermissionComposer;
use App\Http\ViewComposers\RoleComposer;
use App\Http\ViewComposers\SubjectComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['multi_choices.index'], SubjectComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
