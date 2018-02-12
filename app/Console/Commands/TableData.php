<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TableData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:data {name} {select=} {page=0}';

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
        try {
            $data = DB::table($this->argument('name'))
                ->skip($this->argument('page') * 10)
                ->take(10)
                //->select($this->argument('select'))
                ->get();
            dump($data);
        } catch (\Exception $e) {
            echo "Tables don't or column exits \n";
        }

    }
}
