<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModulePolicy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:policy {var}';

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
        $this->create($this->argument('var'));
    }

    function create($name)
    {
        $array = explode(':', $name);

        if (!file_exists(app_path('Modules/' . $array[0]))) {

            echo "Module doesn't exits";

        } else {
            $file = app_path('Modules/' . $array[0] . "/Policies/" . $array[1] . "Policy.php");
            if (file_exists($file)) {
                echo $array[1] . "Policy.php" . "has exit \n";
            } else {
                $myfile = fopen($file, "w");
                fwrite($myfile, $this->text($array));
                echo "Create Policy Success \n";
            }
        }
    }

    public function text($array)
    {
        $text = "<?php \n";
        $text .= "namespace App\\Modules\\$array[0]\\Policies; \n";
        $text .= "use Illuminate\\Auth\\Access\\HandlesAuthorization;\n\n";
        $text .= "class $array[1]Policy\n{\n";
        $text .= "  use HandlesAuthorization;\n";
        $text .= "  public function __construct()\n  {\n  }\n";
        $text .= "  public function owner()\n  {\n  }\n";
        $text .= "}\n";
        return $text;
    }
}
