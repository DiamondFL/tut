<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:request {var}';
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
            if (!file_exists(app_path('Modules/' . $array[0] . '/Requests'))) {
                mkdir(app_path('Modules/' . $array[0] . '/Requests'));
            }
            $myfile = fopen(app_path('Modules/' . $array[0] . "/Requests/" . $array[1] . "Request.php"), "w");
            fwrite($myfile, $this->text($array));
            echo "Create Request Success\n";
        }
    }

    public function text($array)
    {
        $text = "<?php \n";
        $text .= "namespace App\\Modules\\$array[0]\\Requests; \n";
        $text .= "use App\\Http\\Requests\\Request;\n\n";
        $text .= "class $array[1]Request extends Request\n{\n";
        $text .= '  public function authorize(){ return false;}';
        $text .= "\n";
        $text .= '  public function rules(){ return [];}';
        $text .= '  public function messages(){ return [];}';
        $text .= "\n";
        $text .= "}\n";
        return $text;
    }
}