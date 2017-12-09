<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Estandar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;
    
         public function _construct(Guard $auth){
    
            $this->auth = $auth;
         }

    public function handle($request, Closure $next)
    {
         $usuarioActual=\Auth::user();
        if ($usuarioActual->roles_id==2 or $usuarioActual->roles_id==1) {
            return $next($request);
          
        } 
        else{
            return redirect('/mensajeRechazado');                    
        }
    }
}
