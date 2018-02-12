<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:model {var}';

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
            if (!file_exists(app_path('Modules/' . $array[0] . '/Models'))) {
                mkdir(app_path('Modules/' . $array[0] . '/Models'));
            }
            $myfile = fopen(app_path('Modules/' . $array[0] . "/Models/" . $array[1] . ".php"), "w");
            fwrite($myfile, $this->text($array));
            echo "Create Models Success\n";
        }
    }

    public function text($array)
    {
        $text = "<?php \n";
        $text .= "namespace App\\Modules\\$array[0]\\Models; \n";
        $text .= "use Illuminate\\Database\\Eloquent\\Model;\n\n";
        $text .= "class $array[1] extends Model\n{\n";
        $text .= '  public $table;';
        $text .= "\n";
        $text .= '  public $fillable = [];';
        $text .= "\n";
        $text .= "}\n";
        return $text;
    }
}
