<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $tipos = DB::table('tipos')
        ->select('tipos.*')
        ->where('tipos.Estado','=','1')
        ->paginate(7);
      return view('/tipo/listar', ['tipos' => $tipos]);
    }

    public function create()
    {
        $tipos = Tipo::all();
        
        return response()->json(['tipos'=>$tipos]);
          }


        public function store(Request $request)
        {
            $tipos = new Tipo;
            $tipos->Tipo =  $request['Tipo'];
            $tipos->Estado = 1    ;  
            $tipos->save();
            return redirect('/tipos'); 
        }
    
    
        public function edit($id)
        {
            $tipo = Tipo::find($id);
        
            return response()->json(['tipo'=>$tipo]);
        }
    
    
        public function update($id, Request $request)
        {
            $tipo = Tipo::find($id);
            $tipo->Tipo = request('Tipo1');
            
            $tipo->save();
            return redirect('/tipos');
        }
    
        public function change($id)
        {
            $tipo = Tipo::find($id);
                
            return response()->json(['tipo'=>$tipo]);
        }
    
        public function updatestate($id, Request $request)
        {
            
            $tipo = Tipo::find($id);
            $tipo->Estado = 0;    
            $tipo->save();
            return redirect('/tipos');   
        }




}
