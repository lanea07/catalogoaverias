<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
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
        if (!empty(Cookie::get('lang'))) {
            request()->session()->put('locale', Cookie::get('lang'));
            App::setLocale(Cookie::get('lang'));
            $cookie = cookie('lang', Cookie::get('lang'));
        } else {
            request()->session()->put('locale', config('app.locale'));
            App::setLocale(config('app.locale'));
            $cookie = cookie('lang', config('app.locale'), 0, null, null, false, false);
            return $next($request)->withCookie($cookie);
        }
        return $next($request);

    }
}
