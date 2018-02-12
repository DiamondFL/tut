<?php

namespace App\Listeners;

use App\Events\ImportLogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class ImportLogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(ImportLogEvent $event)
    {
        $data = " LINK: " . $event->path . "| FIX: " . env('PREFIX_UPLOAD') . " | 
        creator:" . auth()->user()->username . "|IP: " . Request::ip() . "
         Error: 
        | Time: " . date('Y-m-d H:m:i');
        $file = 'log-import.txt';
        try {
            Storage::disk('local')->prepend($file, $data);
        } catch (\Exception $e) {
            Storage::disk('local')->put($file, $data);
        }

    }
}
