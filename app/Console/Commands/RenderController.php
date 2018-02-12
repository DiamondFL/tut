<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RenderController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'render:controller {folder=""}';

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
    private $ctrl;

    public function handle()
    {
        echo $folder = $this->argument('folder');
        $this->ctrl = camel_case(class_basename($folder));
        $function = '';
        foreach (glob($folder . '/*') as $dir) {
            echo $dir . "\n";
            $function .= $this->doing($dir);
        }
        echo $function;
        $source = file_get_contents(resource_path('views/tools/classes/controller.txt'));
        $this->buildClass(str_singular(ucfirst($this->ctrl)), $function, $source);
    }

    public function doing($dir)
    {
        $names = explode('.', class_basename($dir));
        return $this->buildFunction($names[0]);
    }

    public function buildFunction($name)
    {
        $source = file_get_contents(resource_path('views/tools/functions/view.txt'));
        $source = str_replace('_name_', camel_case($name), $source);
        $source = str_replace('_view_', $name, $source);
        return str_replace('_folder_', $this->ctrl, $source);
    }

    public function buildClass($name, $function, $content)
    {
        $content = str_replace('_name_', $name, $content);
        $content = str_replace('_function_', $function, $content);
        $fileForm = fopen(app_path('Http/Controllers/' . $name . 'Controller.php'), 'w');
        fwrite($fileForm, $content);
    }
}
