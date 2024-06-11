<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
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

        if(request()->is("cordinnateur_filier*") && Auth::user()->role_id==4) {

            return $next($request);
        }
        if(request()->is("chef_departement*") && Auth::user()->role_id==3) {

            return $next($request);
        }
        if(request()->is("professeur*") && Auth::user()->role_id!=1) {

            return $next($request);
        }
        if(request()->is("student*") && Auth::user()->role_id==1) {

            return $next($request);
        }
        if(request()->is("dashboard*") || request()->is("profile*") ) {

            return $next($request);
        }

        return redirect()->back();
    }
}
