<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AbortIfNotOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $name)
    {
        if (!Auth::check()) {
            abort('404');
        }

        if(Auth::user()->isAdmin()){
            return $next($request);
        }

        $form = $request->route($name);
        if (!Auth::user()->can('touch', $form)) {
            abort(404);
        }

        return $next($request);
    }
}
