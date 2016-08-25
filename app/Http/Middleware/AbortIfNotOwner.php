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
    public function handle($request, Closure $next, $project)
    {
        if (!Auth::check()) {
            abort(401, 'Вы не авторизованы...');
        }

        if (Auth::user()->id != $request->$project->author_id) {
            abort('401','Вы не создатель...');
        }

        return $next($request);
    }
}
