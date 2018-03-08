<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/8/2018
 * Time: 6:54 PM
 */
namespace ACL;
use ACL\Facades\AccessFa;
use App\Facades\AccessFun;
use Illuminate\Support\ServiceProvider;

class ACLServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'acl');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->loadMigrationsFrom(__DIR__ .'database/migrations');
    }

    public function register() {
//        $this->app->bind(AccessFa::class, AccessFun::class);
    }
}