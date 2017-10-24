<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class SentinelMiddleware
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
        if (Sentinel::guest()) {
            if ($request->ajax()) {
                return response('Unauhorize', 401);;
            }else {
                return redirect()->guest('login');
            }
        } 
        return $next($request);
    }
}
