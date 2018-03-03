<?php

namespace Bugger\Listeners;

use App\User;
use Bugger\Events\ExceptionEvent;
use Bugger\Notifications\ExceptionNotify;
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
        $email = explode(',',  env('MAIL_BUG'));
        app(User::class)->whereIn('email', $email)->first()
            ->notify(new ExceptionNotify($event->data));
    }
}
