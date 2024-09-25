<?php

namespace App\Http\Middleware;

use Closure;

class ThrottleRequestsWithIp
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
        if($request->ip() === "45.135.232.125") 
            return $next($request);

    }
}
