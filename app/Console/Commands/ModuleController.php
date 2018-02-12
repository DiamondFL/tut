<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:controller {var}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
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
        $this->create($this->argument('var'));
    }

    function create($name)
    {
        $array = explode(':', $name);
        if (!file_exists(app_path('Modules/' . $array[0]))) {
            echo "Module doesn't exits";
        } else {
            if (file_exists(app_path('Modules/' . $array[0] . "/Controllers/" . $array[1] . "Controller.php"))) {
                echo "Controller has exits\n";
            } else {
                $myfile = fopen(app_path('Modules/' . $array[0] . "/Controllers/" . $array[1] . "Controller.php"), "w");
                fwrite($myfile, $this->text($array));
                echo "Create Controller Success\n";
            }
        }
    }

    function text($array)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$array[0]\\Controllers; \n";
        $txt .= "use Illuminate\\Support\\Facades\\Input;\n";
        $txt .= "\nclass $array[1]Controller extends $array[0]Controller\n{\n";
        $txt .= "}\n";
        return $txt;
    }
}
