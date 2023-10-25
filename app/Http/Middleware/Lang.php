<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($request->lang)) {
            request()->session()->put('locale', $request->lang);
            App::setLocale($request->lang);
        } else {
            if (request()->session()->has('locale')) {
                App::setLocale(session('locale'));
            } else {
                request()->session()->put('locale', config('app.locale'));
                App::setLocale(config('app.locale'));
            }
        }
        return $next($request);
    }
}
