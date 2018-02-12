<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class RememberUrlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        $routeAction = explode('@', Route::currentRouteAction());
        $method = $routeAction[1];
        $url = $request->fullUrl();

        if ($method === "index") {
            session()->put($routeAction[0], $url);
        } elseif ($method === "update" || $method == "destroy") {
            if (session()->has($routeAction[0])) {
                $next($request);
                if (!session()->has('errors')) {
                    return redirect()->to(session()->get($routeAction[0]));
                }
            }
        }
        return $next($request);
    }
}
