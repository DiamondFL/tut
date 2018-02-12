<?php

namespace App\Providers;

use App\Events\ImportLogEvent;
use App\Events\LogUploadEvent;
use App\Listeners\ImportLogListener;
use App\Listeners\LogUploadListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        LogUploadEvent::class => [
            LogUploadListener::class
        ],
        ImportLogEvent::class => [
            ImportLogListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
