<?php

namespace App\Http\Controllers;
use App\Activo;
use App\Infraestructura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;


class Otro extends Controller
{
    public function index()
    {
    	$activos = Activo::paginate(2);
        return view('/activo/listar')->withActivos($activos);;
    }

    public function create()
    {
    	$activos = Activo::all();
        
        return view('/activo/crear'); 
    }

    public	function store(Request $request)
    {
    	$this->validate(request(), [
            'Placa'=> 'required']); // agregar los damas campos requeridos

            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->Programa = $request['Programa'];
            $activo->SubPrograma = $request['SubPrograma'];
            $activo->Color = $request['Color'];
            if ($request->file('Foto')->isValid()){
                
                
                    //$imagePath = $request->file('Foto')->store('public');
                    //$image = Image::make(Storage::get($imagePath))->resize(320,240)->encode();
                   // Storage::put($imagePath,$image);
                
                    //$imagePath = explode('/',$imagePath);
                
                    //$imagePath = $imagePath[1];
                    
                    //$activo->Foto = $imagePath;
                   // $activo->Foto = $request->file('Foto')->store($request['Placa']);

                    $file = $request->file('Foto');  //Se guarda el contenido del request de tipo file en una variable
                    $file_route = time().'_'.$file->getClientOriginalName(); //Se guarda la ruta, se utiliza el time para que ningun 
                    Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); //Usar el storage para 
                    $activo->Foto = $file_route; // Al modelo de noticias asignar la ruta creada
                
                    }
            

            $activo->save();
			return redirect('/activos'); 
    }

    public function show($id){
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);

        //$activo = Activo::find($id);
        //$file = Storage::disk('MyDiskDriver')->get($activo->Foto);
        //$activo->Foto = $File;
        return view('/infraestructura/detalle', compact('infraestructura'));

    }

    public function edit($id)
    {
    	$infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        //$infraestructura = DB::table('infraestructuras')
        //->join('activos', 'infraestructuras.activo_id', '=', 'activos.id')
        //->select('activos.*', 'infraestructuras.*')
        //->get();
        return view('/infraestructura/editar',compact('infraestructura'));
    }
    
    public function update($id)
    {
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $activo->Placa = request('Placa');
        $activo->Descripcion = request('Descripcion');
        $activo->Programa = request('Programa');
        $activo->SubPrograma = request('SubPrograma');
        $activo->Color = request('Color');
        $activo->Foto = request('Foto');
        $activo->save();

        $infraestructura->activo_id =  $activo->id;
        $infraestructura->NumeroFinca = request('NumeroFinca');
        $infraestructura->AreaConstruccion = request('AreaConstruccion');
        $infraestructura->AreaTerreno = request('AreaTerreno');
        $infraestructura->AnoFabricacion = request('AnoFabricacion');
        $infraestructura->save();
        return redirect('/infraestructuras');
    }
    
    public function destroy($id)
    {
    	
    }
}
