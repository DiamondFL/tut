<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/12/2018
 * Time: 11:09 PM
 */
namespace Edubeanz\Providers;
class EdubeanzServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom( base_path('packages/edubeanz/src') . '/router.php');
        $this->loadViewsFrom(base_path('packages/edubeanz/src')  . '/resources/views', 'edu');
    }
    public function register()
    {

    }
}