<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('Administrador')->except('index');
    }
    public function index(Request $request)
    {
        $sectores = DB::table('sectores')
        ->select('sectores.*')
        ->where('sectores.Estado','=','1')
        ->paginate(7);
      return view('/sector/listar', ['sectores' => $sectores]);
    }

    public function create()
    {
        $sectores = Sector::all();
        
        return response()->json(['sectores'=>$sectores]);
          }


        public function store(Request $request)
        {
            $sectores = new Sector;
            $sectores->Sector =  $request['Sector'];
            $sectores->Estado = 1    ;  
            $sectores->save();
            return redirect('/sectores'); 
        }
    
    
        public function edit($id)
        {
            $sector = Sector::find($id);
        
            return response()->json(['sector'=>$sector]);
        }
    
    
        public function update($id, Request $request)
        {
            $sector = Sector::find($id);
            $sector->Sector = request('Sector1');
            
            $sector->save();
            return redirect('/sectores');
        }
    
        public function change($id)
        {
            $sector = Sector::find($id);
                
            return response()->json(['sector'=>$sector]);
        }
    
        public function updatestate($id, Request $request)
        {
            
            $sector = Sector::find($id);
            $sector->Estado = 0;    
            $sector->save();
            return redirect('/sectores');   
        }
}
