<?php

namespace App\Http\Middleware;

use App\AuthBusiness;
use Closure;

class Auth
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
        if( !AuthBusiness::isUserConnected() ){
            return redirect()->route('envLoginPage'); /* login après */ 
        }
        return $next($request);
    }
}
