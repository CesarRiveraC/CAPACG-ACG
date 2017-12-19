<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioActual=\Auth::user();
        if($usuarioActual->roles_id==1 or $usuarioActual->roles_id==2){
            return view('home');
        }
        // else if($usuarioActual->roles_id==2){
        //     return view('/estandar/home');
        // }
        else if($usuarioActual->roles_id==3){
            return view('/colaborador/home');
        }
        else{
            return view('/mensajeRechazado');
        }
        
    }

    public function colaborador(){

        return view ('/colaborador/home');
    }

    public function estandar(){
        
        return view ('/estandar/home');
    }
}
