<?php

namespace App\Http\Middleware;

use Closure;

class UserNotAdmin
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

        if(auth('api')->user()->roles()->first()->name!=="admin"){
             return response()->json(['status' =>'Requires admin access','code'=>402],401);
        }
        return $next($request);
    }
}
