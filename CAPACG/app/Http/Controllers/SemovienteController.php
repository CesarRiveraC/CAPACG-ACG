<?php

namespace App\Http\Controllers;

use App\Semoviente;
use App\Activo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class SemovienteController extends Controller
{
    //

    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }

    public function index()
    {
        $semovientes = DB::table('semovientes')
        ->join('activos','semovientes.activo_id', '=','activos.id')
        ->select('activos.*','semovientes.*')
        ->get();

        $semovientesPaginados = $this->paginate($semovientes->toArray(),5);
        return view('/semoviente/listar', ['semovientes' => $semovientesPaginados]);
    }

    public function create()
    {
        $semovientes = Semoviente::all();
        
        return view('/semoviente/crear'); 
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'Raza'=> 'required']); // agregar los damas campos requeridos

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

            $semoviente = new Semoviente;
            $semoviente->activo_id =  $activo->id;
            $semoviente->Raza = $request['Raza'];
            $semoviente->Edad = $request['Edad'];
            $semoviente->Peso = $request['Peso'];
            $semoviente->save();

			return redirect('/semovientes'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

    public function show($id){
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $semoviente->activo()->associate($activo);

        
        return response()->json(['semoviente'=>$semoviente]);        

    }

    public function edit($id)
    {
    	$semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $semoviente->activo()->associate($activo);
        
        return view('/semoviente/editar',compact('semoviente'));
    }
    
    public function update($id, Request $request)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
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

        $semoviente->activo_id =  $activo->id;
        $semoviente->Raza = request('Raza');
        $semoviente->Edad = request('Edad');
        $semoviente->Peso = request('Peso');
        $semoviente->save();
        return redirect('/semovientes');
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
