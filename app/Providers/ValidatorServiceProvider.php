<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('captcha', function ($attribute, $value, $parameters) {
            return captcha_validate($value);
        });

        Validator::extend('audio', function ($attribute, $value, $parameters) {
            $allowed = array('audio/mpeg', 'application/ogg', 'audio/wave', 'audio/aiff');
            $mines = $value->getMimeType();
            if (in_array($mines, $allowed)) return true;
            return false;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
