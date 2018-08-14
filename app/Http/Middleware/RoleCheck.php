<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use Illuminate\Support\Facades\Redirect;
    
class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ( Auth::check() && Auth::user()->hasRole($role) )
        {
            return $next($request);
        }

        return abort(403); //Unauthorized

    }
}
