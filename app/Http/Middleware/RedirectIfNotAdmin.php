<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
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
        //dd(0);
        if (!(Auth::guard($guard)->check()) || Auth::user()->isAdmin()==0) {
            
            
            return redirect(route('site.index'));
            
            
        }

        return $next($request);
    }
}
