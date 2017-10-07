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
        switch($this->auth->user()->Rol){

            case '1':
            //se define como vacio el case cuando es true para evitr un bucle de direccionamiento...
            break;
            case '2':
            // aca se va a definir el redireccionamiento para colaborador en caso que el usuario tenga los permisos de colaborador
            //    return redirect()->to('Colaborador');
            
            break;


        }


        return $next($request);
    }



}
