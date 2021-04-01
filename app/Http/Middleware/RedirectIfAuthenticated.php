<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/');
        // }
        // if (Auth::guard($guard)->check()) {
        //     if ($guard == 'admin')
        //     return redirect('/admin/home');
        //     return redirect('/');
        // }

        if (Auth::guard()->check())
        return redirect('/');
        if (Auth::guard('admin')->check())
        return redirect('/admin/home');
        

        return $next($request);
    }
}
