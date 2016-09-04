<?php

namespace App\Http\Middleware;

use Closure;

class AbortIfPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$project)
    {

        if ($request->$project->status == 1) {
            abort('401','Нельзя редактировать опубликованный материал');
        }

        return $next($request);
    }
}
