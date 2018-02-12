<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {var}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!file_exists(app_path('Modules'))) {
            mkdir(app_path('Modules'), 0755, true);
        }

        if (!file_exists(app_path('Modules/' . $this->argument('var')))) {
            $this->create(ucfirst($this->argument('var')));
        } else {
            echo "Module Exist\n";
        }
    }

    function create($name)
    {
        mkdir(app_path('Modules/' . $name . '/Controllers'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Middleware'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Repositories'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Requests'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Policies'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Providers'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Models'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Resources'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Resources/lang'), 0755, true);
        mkdir(app_path('Modules/' . $name . '/Resources/views'), 0755, true);
        /**
         * ======================================================>Controller
         */
        $myfile = fopen(app_path('Modules/' . $name . "/Controllers/" . $name . "Controller.php"), "w");
        fwrite($myfile, $this->txtController($name));
        /**
         * =======================================================> Repository Provider
         */

        $myfile = fopen(app_path('Modules/' . $name . "/Providers/" . $name . "RepositoryProvider.php"), "w");
        fwrite($myfile, $this->txtProvider($name));

        /**
         * =======================================================> Auth Provider
         */
        $myfile = fopen(app_path('Modules/' . $name . "/Providers/" . $name . "AuthProvider.php"), "w");

        fwrite($myfile, $this->txtProviderAuth($name));

        /**
         * =======================================================> Route
         */

        $myfile = fopen(app_path('Modules/' . $name . "/routes.php"), "w");

        fwrite($myfile, $this->txtRoute());

        $myfile = fopen(app_path('Modules/' . $name . "/guild.txt"), "w");

        fwrite($myfile, $this->guild());

        echo "Create Module Success\n";
    }

    function txtController($name)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$name\\Controllers; \n";
        $txt .= "use App\\Http\\Controllers\\Controller; \n\n";
        $txt .= "class " . $name . "Controller extends Controller\n{\n";
        $txt .= '   protected $prefix = "' . strtolower($name) . '";';
        $txt .= "\n";
        $txt .= "}\n";
        return $txt;
    }

    function txtProvider($name)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$name\\Providers; \n";
        $txt .= "use Illuminate\\Support\\ServiceProvider; \n\n";
        $txt .= "class " . $name . "RepositoryProvider extends ServiceProvider\n{\n";
        $txt .= "   public function boot(){\n}\n";
        $txt .= "   public function register(){\n}\n";
        $txt .= "}\n";
        return $txt;
    }

    function txtProviderAuth($name)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$name\\Providers; \n";
        $txt .= "use Illuminate\\Contracts\\Auth\\Access\\Gate as GateContract; \n";
        $txt .= "use Illuminate\\Foundation\\Support\\Providers\\AuthServiceProvider as ServiceProvider; \n\n";
        $txt .= "class " . $name . "AuthProvider extends ServiceProvider\n{\n";
        $txt .= '   protected $policies = [];';
        $txt .= "\n";
        $txt .= '   public function boot(GateContract $gate){';
        $txt .= "\n";
        $txt .= '$this->registerPolicies($gate);';
        $txt .= "   \n}\n";
        $txt .= "}\n";
        return $txt;
    }

    function txtRoute()
    {
        $txt = "<?php \n";
        $txt .= "   Route::group(['middleware'=>['web']], function() { });";
        return $txt;
    }

    function guild()
    {
        $txt = "Đăng ký views tại : App\\Providers\\AppServiceProvider \n";
        $txt .= "Thêm: \n";
        $txt .= '$this->loadViewsFrom(app_path(\'Modules/NAME_MODULE/Resources/views\'), \'NAME_MODULE\'); ';
        $txt .= "\n vào method boot \n";
        $txt .= "Đăng ký route tại : \n";
        $txt .= "App\\Providers\\RouteServiceProvider\n";
        $txt .= 'Thêm: $router->group([\'namespace\' => \'App\Modules\NAME_MODULE\Controllers\'], function ($router){
                    require app_path(\'Modules/NAME_MODULE/routes.php\');
                });';
        $txt .= "tại method mapWebRoutes hoặc map";
        $txt .= "";
        return $txt;
    }
}
