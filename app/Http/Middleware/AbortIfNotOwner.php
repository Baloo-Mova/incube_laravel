<?php

namespace App\Http\Middleware;

use Closure;

class PostOwner
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



        dd();

        $n = $next($request);



        return $n;
    }
}
