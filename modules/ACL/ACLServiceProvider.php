<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/8/2018
 * Time: 6:54 PM
 */
namespace ACL;
use ACL\Facades\AccessFa;
use ACL\Http\ViewComposers\PermissionComposer;
use ACL\Repositories\PermissionRepository;
use ACL\Repositories\PermissionRepositoryEloquent;
use ACL\Repositories\RoleRepository;
use ACL\Repositories\RoleRepositoryEloquent;
use App\Facades\AccessFun;
use ACL\Http\ViewComposers\RoleComposer;
use Illuminate\Support\ServiceProvider;

class ACLServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'acl');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->loadMigrationsFrom(__DIR__ .'database/migrations');

        view()->composer([
            'acl::users.table', 'acl::layouts.lists.role', 'acl::permissions.index'
        ], RoleComposer::class);
        view()->composer([
            'acl::layouts.lists.permission'
        ], PermissionComposer::class);
    }

    public function register() {
        $this->app->bind(AccessFa::class, AccessFun::class);
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        view()->composer(['layouts.lists.permission'],PermissionComposer::class);

    }
}