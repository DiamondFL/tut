<?php

namespace Edubeanz\Plan\Listeners;

use Edubeanz\Plan\Events\MarkEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarkListener
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
     * @param  MarkEvent  $event
     * @return void
     */
    public function handle(MarkEvent $event)
    {
        //
    }
}
