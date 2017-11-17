<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('Administrador')->except('index');
    }
    public function index(Request $request)
    {
        
         $tipos = Tipo::all();
        
        
          
      
        return view('/tipo/listar', compact('tipos'));
    }

    public function create()
    {
        $tipos = Tipo::all();
        
        return response()->json(['tipos'=>$tipos]);
        //return view('/dependencia/crear'); 
    }
}
