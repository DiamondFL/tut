<?php

namespace App\Console;

use App\Console\Commands\FileChange;
use App\Console\Commands\FileRemove;
use App\Console\Commands\FileRename;
use App\Console\Commands\FileStructure;
use App\Console\Commands\Module;
use App\Console\Commands\RenderController;
use App\Console\Commands\RenderRoute;
use App\Console\Commands\TableColumn;
use App\Console\Commands\TableName;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Istruct\Console\Commands\ConstDBCommand;
use Istruct\Console\Commands\TransDBCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ConstDBCommand::class,
        FileRemove::class,
        FileChange::class,
        FileStructure::class,
        TableColumn::class,
        TableName::class,
        RenderRoute::class,
        FileRename::class,
        RenderController::class,
        TransDBCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
