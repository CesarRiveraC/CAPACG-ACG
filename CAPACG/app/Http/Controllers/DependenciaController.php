<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('Administrador')->except('create');
    }
    public function index(Request $request)
    {
                
    $dependencias = DB::table('dependencias')
    ->select('dependencias.*')
    ->where('dependencias.Estado','=','1')
    ->paginate(10); // este paginate no esta funcionando ?
  return view('/dependencia/listar', ['dependencias' => $dependencias]);
    }

    public function create()
    {
        $dependencias = Dependencia::all();
        
        return response()->json(['dependencias'=>$dependencias]);

    }

    public function store(Request $request)
    {
        $dependencia = new Dependencia;
        $dependencia->Dependencia =  $request['Dependencia'];
        $dependencia->Estado = 1    ;  
        $dependencia->save();
        return redirect('/dependencias'); 
    }

    public function edit($id)
    {
    	$dependencia = Dependencia::find($id);
   
        return response()->json(['dependencia'=>$dependencia]);
    }

 
    public function update($id, Request $request)
    {
        $dependencia = Dependencia::find($id);
        $dependencia->Dependencia = request('Dependencia1');
       
        $dependencia->save();
        return redirect('/dependencias');
    }

    public function change($id)
    {
    	$dependencia = Dependencia::find($id);
              
        return response()->json(['dependencia'=>$dependencia]);
    }

    public function updatestate($id, Request $request)
    {
        
        $dependencia = Dependencia::find($id);
        if ($dependencia->Estado == 1) {
            $dependencia->Estado = 0;
        } else if ($dependencia->Estado == 0) {
            $dependencia->Estado = 1;
        }  
        $dependencia->save();
        return redirect('/dependencias');   
    }
  
}
