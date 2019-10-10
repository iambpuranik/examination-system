<?php

namespace App\Http\Middleware;

use Closure;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    //only accessible to user type admin
    public function handle($request, Closure $next)
    {
        if (auth()->user()->user_role == "user") {
            return $next($request);
        } else {
            return response('Unauthorized.', 401);
        }
    }
}
