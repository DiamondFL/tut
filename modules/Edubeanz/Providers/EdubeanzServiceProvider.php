<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/12/2018
 * Time: 11:09 PM
 */
namespace Edubeanz\Providers;
use Edubeanz\Http\ViewComposers\ProjectComposer;
use Illuminate\Support\ServiceProvider;

class EdubeanzServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom( base_path('modules/edubeanz') . '/router.php');
        $this->loadViewsFrom(base_path('modules/edubeanz')  . '/resources/views', 'edu');

        view()->composer(['edu::layouts.nav'], ProjectComposer::class);
    }
    public function register()
    {

    }
}