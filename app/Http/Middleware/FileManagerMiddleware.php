<?php

namespace App\Http\Middleware;

use Closure;

class FileManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        config(['lfm.images_dir' => 'public/vendor/laravel-filemanager/images/']);
        config(['lfm.images_url' => asset('').'vendor/laravel-filemanager/images/']);
        return $next($request);
    }
}
