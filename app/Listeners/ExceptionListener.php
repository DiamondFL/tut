<?php

namespace App\Listeners;

use App\Events\ExceptionEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionListener
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

    /**
     * Handle the event.
     *
     * @param  ExceptionEvent  $event
     * @return void
     */
    public function handle(ExceptionEvent $event)
    {
        //
    }
}
