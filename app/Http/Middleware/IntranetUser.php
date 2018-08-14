<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class IntranetUser
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
        if ( Auth::check() && Auth::user()->hasRole('INTRANET_USR') )
        {
            return $next($request);
        }

        Session::flush();
        Auth::logout();

        abort(403,'Unauthorized action.');

    }
}
