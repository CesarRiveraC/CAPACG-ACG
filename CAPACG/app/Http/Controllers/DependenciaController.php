<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('Administrador')->except('index');
    }
    public function index(Request $request)
    {
        
         $dependencias = Dependencia::all();
        
        
          
      
        return view('/dependencia/listar', compact('dependencias'));
    }

    public function create()
    {
        $depedencias = Dependencia::all();
        
        return view('/dependencia/crear'); 
    }

    public function store(Request $request)
    {
        $dependencia = new Dependencia;
        $dependencia->Dependencia =  $request['Dependencia'];
        
        $dependencia->save();
        return redirect('/dependencias'); 
    }

    public function show($id){
        $dependencia = Dependencia::find($id);
     
             
        return response()->json(['dependencia'=>$dependencia]);

    }

}
