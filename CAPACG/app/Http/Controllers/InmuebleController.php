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

    public function index()
    {
        $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->get();

        $inmueblesPaginadas = $this->paginate($inmuebles->toArray(),5);
        return view('/inmueble/listar', ['inmuebles' => $inmueblesPaginadas]);
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
