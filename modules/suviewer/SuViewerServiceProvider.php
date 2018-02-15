<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 1/27/2018
 * Time: 11:39 AM
 */
namespace SuViewer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use SuViewer\Facades\MenuFun;

class SuViewerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('isActive', function ($is_active) {
            return "<?php echo $is_active ? '<i class=\"fa fa-check text-success\"></i>' : '<i class=\"fa fa-ban text-danger\"></i>' ?>";
        });

        Blade::directive('sort', function ($field) {
            return "<?php echo app('input')->setSort(with{$field}); ?>";
        });

        Blade::directive('menu', function ($group) {
            return "<?php echo MenuFa::isActive($group); ?>";
        });
        Blade::directive('item-menu', function ($group) {
            return "<?php echo request()->is('$group*') ? 'active' : ''; ?>";
        });

        Blade::directive('roleName', function ($user) {
            return "<?php echo FoFormat::roleName($user); ?>";
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/menu.php', 'menu');
        $this->app->bind('MenuFa', MenuFun::class);
    }
}