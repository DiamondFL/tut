<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('isActive', function ($is_active) {
            return "<?php echo $is_active ? '<i class=\"fa fa-check text-success\"></i>' : '<i class=\"fa fa-ban text-danger\"></i>' ?>";
        });


        Blade::directive('image', function ($expression) {
            return "<?php if(with{$expression}){?>
                 <div class='dropdown'>
                    <img width=\"80\" height=\"60\" src=\"<?php echo config('config.image_host').with{$expression}; ?>\">
                    <div class=\"dropdown-content\">
                        <img src=\"<?php echo config('config.image_host').with{$expression}; ?>\" width=\"300\" height=\"200\">
                    </div>
                </div>
                <?php }else{?>
                    <div><img width=\"80\" height=\"60\" src=\"http://vip.img.cdn.keeng.vn/sata11/images/images_thumb/f_sata11/singer/2016/12/29/383710c9c691de0c63aacfa4a86d01d1_310_310.jpg\"></div>
                <?php }?>
            ";
        });


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
