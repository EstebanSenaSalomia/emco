<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



class admin
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
        if($request->user()->admin()){

          return $next($request);
        }else{
            abort(401);
        }
        //llamamos a la funcion admin que se encuentra en el modelo
        //continua tu camino
    
    
    }
}
