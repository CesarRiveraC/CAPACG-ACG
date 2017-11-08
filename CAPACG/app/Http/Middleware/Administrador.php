<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\ Http\Request  $request
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
        if ($usuarioActual->Rol!=1) {
           // abort(403, 'Unauthorized action.');
           return redirect('/mensajeRechazado');
        } 
        else{
            return $next($request);                        
        }
    }

}
