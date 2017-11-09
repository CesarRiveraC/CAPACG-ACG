<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use App\Activo;
use App\Inmueble;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Storage;

class VehiculoController extends Controller
{
    //

    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }
    public function index()
    {
        $vehiculos = DB::table('vehiculos')
        ->join('inmuebles','vehiculos.inmueble_id', '=','inmuebles.id')
        ->join('activos', 'inmuebles.activo_id', '=', 'activos.id')
        ->select('activos.*','inmuebles.*','vehiculos.*')
        ->where('activos.Estado','=','0') //hay que definir bien cual es el que se va a utilizar
        ->paginate(10);

        //$vehiculosPaginadas = $this->paginate($vehiculos->toArray(),5);
        return view('/vehiculo/listar', ['vehiculos' => $vehiculos]);
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
    
        return view('/vehiculo/crear'); 
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'Placa'=> 'required']); // agregar los damas campos requeridos
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

            $vehiculo = new Vehiculo;
            
            $vehiculo->inmueble_id =  $inmueble->id;            
            $vehiculo->Placa = $request['Placa'];
            $vehiculo->save();
        // $vehiculo = Vehiculo::create(request()->all());
            return redirect('/vehiculos'); 
    }

    public function show($id){
        $vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
        $activo = Activo::find($inmueble->activo_id);
        $vehiculo->inmueble()->associate($inmueble);
        $inmueble->activo()->associate($activo);

        
        return response()->json(['vehiculo'=>$vehiculo]);        

    }

    public function edit($id)
    {
    	$vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
        $activo = Activo::find($inmueble->activo_id);
        $vehiculo->inmueble()->associate($inmueble);
        $inmueble->activo()->associate($activo);
        
        return view('/vehiculo/editar',compact('vehiculo'));
    }
    
    public function update($id, Request $request)
    {
        $vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
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

        $vehiculo->inmueble_id =  $inmueble->id;            
        $vehiculo->Placa = request('Placa');
        $vehiculo->save();


        return redirect('/vehiculos');
    }


    public function change($id)
    {
    	$vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
        $activo = Activo::find($inmueble->activo_id);
        $vehiculo->inmueble()->associate($inmueble);
        $inmueble->activo()->associate($activo);
        
        return response()->json(['vehiculo'=>$vehiculo]);
        
    }

    public function updatestate($id)
    {
        $vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
        $activo = Activo::find($inmueble->activo_id);
      
        $activo->Estado = 1;    

       
        $activo->save();

     
        return redirect('/vehiculos');
    }
    public function excel(){
        
 
         Excel::create('Reporte Vehiculos', function($excel) {
  
             $excel->sheet('Activos', function($sheet) {
  
                 //$infraestructuras = Activo::all();
                 $vehiculos = DB::table('vehiculos')
                 ->join('inmuebles','vehiculos.inmueble_id', '=','inmuebles.id')
                 ->join('activos', 'inmuebles.activo_id', '=', 'activos.id')
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa',
                 'activos.SubPrograma','activos.Color','inmuebles.Serie','inmuebles.Dependencia'
                 ,'inmuebles.EstadoUtilizacion', 'inmuebles.EstadoFisico','inmuebles.EstadoActivo',
                 'vehiculos.Placa')
                 ->where('activos.Estado','=','0') //cambiar el estado para generar el reporte
                 ->get();
 
                 $vehiculos = json_decode(json_encode($vehiculos),true);
                 $sheet->freezeFirstRow();
                 $sheet->fromArray($vehiculos);
  
             });
         })->export('xls');
 
     }
    
}
