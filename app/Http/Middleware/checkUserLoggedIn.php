<?php

namespace App\Http\Middleware;

use Closure;

class checkUserLoggedIn
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
        if(empty(session("userLoggedIn")) || session("userLoggedIn") == false){
            return redirect()->route('user-login');
        }
        return $next($request);
    }
}
