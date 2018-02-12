<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:repository {var}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
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
            $rep = 'Modules/' . $array[0] . "/Repositories";
            if (!file_exists(app_path($rep))) {
                mkdir(app_path($rep), 0755, true);
            }

            $file = app_path($rep . '/' . $array[1] . "Repository.php");
            if (file_exists($file)) {
                echo $array[1] . "Repository.php" . " exit \n";
            } else {
                $myfile = fopen($file, "w");
                fwrite($myfile, $this->text($array));

                echo "Create Interface Success \n";
            }

            $file = app_path($rep . '/' . $array[1] . "RepositoryEloquent.php");
            if (file_exists($file)) {
                echo $array[1] . "RepositoryEloquent.php" . " exit \n";
            } else {
                $myfile = fopen($file, "w");
                fwrite($myfile, $this->textE($array));

                echo "Create Repository Success \n";
            }
        }
    }

    function text($array)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$array[0]\\Repositories; \n";
        $txt .= "\n";
        $txt .= "interface $array[1]Repository\n{\n";
        $txt .= "   public function data();\n";
        $txt .= '   public function create($input);';
        $txt .= "\n";
        $txt .= '   public function update($input);';
        $txt .= "\n";
        $txt .= '   public function find($id);';
        $txt .= "\n";
        $txt .= '   public function delete($input);';
        $txt .= "\n";
        $txt .= "}\n";
        return $txt;
    }

    function textE($array)
    {
        $txt = "<?php \n";
        $txt .= "namespace App\\Modules\\$array[0]\\Repositories; \n";
        $txt .= "\n";
        $txt .= "class $array[1]RepositoryEloquent implements $array[1]Repository\n{\n";
        $txt .= '   protected $model;';
        $txt .= "\n";
        $txt .= "public function __construct(){}\n";
        $txt .= "   public function data(){}\n";
        $txt .= '   public function create($input){}';
        $txt .= "\n";
        $txt .= '   public function update($input){}';
        $txt .= "\n";
        $txt .= '   public function find($id){}';
        $txt .= "\n";
        $txt .= '   public function delete($input){}';
        $txt .= "\n";
        $txt .= "}\n";
        return $txt;
    }
}
