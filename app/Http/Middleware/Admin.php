<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (strcasecmp(auth()->user()->Rol->nombre, 'Admin') == 0){
                       // dd(auth()->user()->name);
            return $next($request);

        }
        else{
            abort(401);
        }

       
        
    }
}
