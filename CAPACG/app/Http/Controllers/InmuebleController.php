<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Inmueble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        ->paginate();
      
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
    
        return view('/inmueble/detalle', compact('inmueble'));

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
        
        return view('/inmueble/cambiarEstado',compact('inmueble'));
    }

    public function updatestate($id, Request $request)
    {
        
        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
      
        $activo->Estado = 0;    

       
        $activo->save();

     
        return redirect('/inmuebles');
    }

    
    public function search()
    {

      $q=request('search');
      
      $inmuebles = DB::table('inmuebles')
      ->join('activos','inmuebles.activo_id', '=','activos.id')
      ->select('activos.*','inmuebles.*')
      ->where('activos.Estado','=','1')
      ->where('activos.Placa','LIKE','%' .$q.'%')
      ->paginate();
    
      return view('/inmueble/listar', ['inmuebles' => $inmuebles]);
    

    
    }


    public function paginate($items, $perPages){
        $pageStart = \Request::get('page',1);
        $offSet = ($pageStart * $perPages)-$perPages;
        $itemsForCurrentPage = array_slice($items,$offSet, $perPages, TRUE);

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsForCurrentPage, count($items),
            $perPages, \Illuminate\Pagination\Paginator::resolveCurrentPage(),
            ['path'=> \Illuminate\Pagination\Paginator::resolveCurrentPath()]
        );
            }


}
