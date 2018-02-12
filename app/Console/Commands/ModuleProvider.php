<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleProvider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:provider {var}';

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
        $name = $this->argument('var');
        $array = explode(':', $name);
        $this->create($array);
    }

    function create($array)
    {
        $dir = app_path('Modules/' . $array[0] . '/Providers');

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        $path = app_path('Modules/' . $array[0] . "/Providers/" . $array[0] . "$array[1]Provider.php");
        if (!file_exists($path)) {
            $myfile = fopen($path, "w");
            fwrite($myfile, $this->text($array));
            echo "Create Module Provider \n";
        } else {
            echo "$array[1]Provider.php has exists \n";
        }
    }

    function text($array)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$array[0]\\Providers; \n";
        $txt .= "use Illuminate\\Support\\ServiceProvider; \n\n";
        $txt .= "class " . $array[0] . $array[1] . "Provider extends ServiceProvider\n{\n";
        $txt .= "public function boot(){\n}\n";
        $txt .= "public function register(){\n}\n";
        $txt .= "}\n";
        return $txt;
    }

}
