<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class InmuebleController extends Controller

{
    //
    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }

    public function index(Request $request)
    {
        
         $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->where('activos.Estado','=','1')
        ->paginate(7);
      
        return view('/inmueble/listar', ['inmuebles' => $inmuebles]);
    }

    public function create()
    {
        $inmuebles = Inmueble::all();
        return view('/inmueble/crear');
       
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'Serie'=> 'required']); // agregar los damas campos requeridos
            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->Programa = $request['Programa'];
            $activo->SubPrograma = $request['SubPrograma'];
            $activo->Color = $request['Color'];
            $activo->Estado = 1;

            if ($request->hasFile('Foto')){ 
                
                                $file = $request->file('Foto');  
                                $file_route = time().'_'.$file->getClientOriginalName(); 
                                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                                $activo->Foto = $file_route; 
                            
                                }
            $activo->save();

            $inmueble = new Inmueble;
            $inmueble->activo_id =  $activo->id;
            $inmueble->Serie = $request['Serie'];
            $inmueble->Dependencia = $request['Dependencia'];
            $inmueble->EstadoUtilizacion = $request['EstadoUtilizacion'];
            $inmueble->EstadoFisico = $request['EstadoFisico'];
            $inmueble->EstadoActivo = $request['EstadoActivo'];
            $inmueble->save();
       
            return redirect('/inmuebles'); 
            
           
    }

    public function show($id){

        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);
    
        return response()->json(['inmueble'=>$inmueble]);

    }


    public function edit($id)
    {
    	$inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);
        
        return view('/inmueble/editar',compact('inmueble'));
    }

    public function update($id, Request $request)
    {
        
        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);

        $activo->Placa = request('Placa');
        $activo->Descripcion = request('Descripcion');
        $activo->Programa = request('Programa');
        $activo->SubPrograma = request('SubPrograma');
        $activo->Color = request('Color');      

        if ($request->hasFile('Foto')){ 
            Storage::delete($activo->Foto);

                            $file = $request->file('Foto');  
                            $file_route = time().'_'.$file->getClientOriginalName(); 
                            Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                            $activo->Foto = $file_route; 
                        
        }
        $activo->save();

        $inmueble->activo_id =  $activo->id;
        $inmueble->Serie = request('Serie');
        $inmueble->Dependencia = request('Dependencia');
        $inmueble->EstadoUtilizacion = request('EstadoUtilizacion');
        $inmueble->EstadoFisico = request('EstadoFisico');
        $inmueble->EstadoActivo = request('EstadoActivo');
        $inmueble->save();    

        return redirect('/inmuebles');
    }

    public function change($id)
    {
    	$inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);
        
        return response()->json(['inmueble'=>$inmueble]);
    }



    public function updatestate($id, Request $request)
    {
        
        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
      
        $activo->Estado = 0;    

       
        $activo->save();

     
        return redirect('/inmuebles');
    }


    public function search(Request $request)
    {
        $inmuebles = Inmueble::buscar($request->get('buscar'))
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->where('activos.Estado','=','1')->paginate(7);
        return view('inmueble/listar',compact('inmuebles'));
    }

    public function excel(){

         Excel::create('Reporte Inmueble', function($excel) {
  
             $excel->sheet('Activos', function($sheet) {   
                  $inmuebles = DB::table('inmuebles')
                 ->join('activos','inmuebles.activo_id', '=','activos.id')
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa',
                 'activos.SubPrograma','activos.Color','inmuebles.Serie','inmuebles.Dependencia'
                 ,'inmuebles.EstadoUtilizacion','inmuebles.EstadoFisico','inmuebles.EstadoActivo')
                 ->where('activos.Estado','=','1') //cambiar el estado para generar el reporte
                 ->get();
 
                 $inmuebles = json_decode(json_encode($inmuebles),true);
                 $sheet->freezeFirstRow();
                 $sheet->fromArray($inmuebles);
             });
         })->export('xls');
     }
    

}
