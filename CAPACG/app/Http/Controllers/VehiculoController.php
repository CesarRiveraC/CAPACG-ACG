<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use App\Activo;
use App\Inmueble;
use App\Dependencia;
use App\Tipo;
use Illuminate\Support\Facades\Validator;
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
        ->where('activos.Estado','=','1') //hay que definir bien cual es el que se va a utilizar
        ->paginate(10);

    ;
        return view('/vehiculo/listar', ['vehiculos' => $vehiculos]);
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        return view('/vehiculo/crear', compact('dependencias','tipos'));
       
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa',
            'Placa' => 'required|unique:vehiculo,Placa',
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Serie' => 'required',         
            'Marca' => 'required',
            'Modelo' => 'required',        
            'EstadoUtilizacion' => 'required', 
            'EstadoFisico' => 'required',  
            'EstadoActivo' => 'required',   
            'EstadoActivo' => 'required',   
            'Placa' => 'required',     
            
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Serie.required' => 'Debe definir la serie',
            'Marca.required' => 'Debe definir la marca',
            'Modelo.required' => 'Debe definir el modelo',
            'EstadoUtilizacion.required' => 'Debe definir el estado de utilización',
            'EstadoFisico.required' => 'Debe definir el estado físico',
            'EstadoActivo.required' => 'Debe definir el estado del activo',
            'Placa.required' => 'Debe definir la placa del vehículo',
            
        ]
    );


    if ($validator->fails()) {
        return redirect('vehiculos/create')
                    ->withInput()
                    ->withErrors($validator);
    }
    else{
            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->dependencia_id = $request['Dependencia'];
            $activo->tipo_id = $request['TipoActivo'];
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
            $inmueble->EstadoUtilizacion = $request['EstadoUtilizacion'];
            $inmueble->EstadoFisico = $request['EstadoFisico'];
            $inmueble->EstadoActivo = $request['EstadoActivo'];
            $inmueble->save();

            $vehiculo = new Vehiculo;
            
            $vehiculo->inmueble_id =  $inmueble->id;            
            $vehiculo->Placa = $request['Placa'];
            $vehiculo->save();
   
            return redirect('/vehiculos'); 
    }
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
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        
        return view('/vehiculo/editar',compact('vehiculo','dependencias','tipos'));
    
    }
    
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required',
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'Subprograma' => 'required',
            'Color' => 'required',
            'Dependecnia' => 'required',
            'Raza' => 'required',         
            'Edad' => 'required',
            'Peso' => 'required',        
           
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'Subprograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Raza.required' => 'Debe definir la raza',
            'Edad.required' => 'Debe definir la edad',
            'Peso.required' => 'Debe definir el peso',
        ]
    );


    if ($validator->fails()) {
        return redirect('vehiculos/edit')
                    ->withInput()
                    ->withErrors($validator);
    }
    else{
        $vehiculo = Vehiculo::find($id);
        $inmueble = Inmueble::find($vehiculo->inmueble_id);
        $activo = Activo::find($inmueble->activo_id);

        $activo->Placa = request('Placa');
        $activo->Descripcion = request('Descripcion');
        $activo->tipo_id = $request['TipoActivo'];
        $activo->dependencia_id = request('Dependencia');
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
        $inmueble->EstadoUtilizacion = request('EstadoUtilizacion');
        $inmueble->EstadoFisico = request('EstadoFisico');
        $inmueble->EstadoActivo = request('EstadoActivo');
        $inmueble->save();

        $vehiculo->inmueble_id =  $inmueble->id;            
        $vehiculo->Placa = request('Placa');
        $vehiculo->save();


        return redirect('/vehiculos');}
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
        $activo->Estado = 0;     
        $activo->save();
     
        return redirect('/vehiculos');
    }

    
    public function search(Request $request)
    {
        $vehiculos = Vehiculo::buscar($request->get('buscar'))
        ->join('activos','vehiculos.activo_id', '=','activos.id')
        ->where('activos.Estado','=','1')->paginate(10);
        return view('vehiculo/listar',compact('vehiculos'));
    }

    public function filter(){
 
      
        $vehiculos = DB::table('vehiculos')
        ->join('inmuebles','inmuebles.activo_id', '=','activos.id')
        ->where('inmuebles.activos.Estado','=', '0')  
        ->paginate(2);
 
        return view('/vehiculo/listar', ['vehiculos' => $vehiculos]);
    }

    public function filterDependencia(Request $request){
        
        $name = $request->input('DependenciaFiltrar');
       
        $vehiculos = DB::table('vehiculos')
        ->join('activos','vehiculos.activo_id', '=','activos.id')
        ->where('activos.dependencia_id','=', $name)   
        ->paginate(2);
        
        return view('/vehiculo/listar', ['vehiculos' => $vehiculos]);
    }

    public function filterTipo(Request $request){
        
        $name = $request->input('TipoFiltrar');
       
        $infraestructuras = DB::table('vehiculos')
        ->join('activos','vehiculos.activo_id', '=','activos.id')
        ->where('activos.tipo_id','=', $name)  
        ->paginate(2);
        
        return view('/vehiculos/listar', ['vehiculos' => $vehiculos]);
    }

    public function filterDate(Request $request){
        
        $desde = $request->input('Desde');
        $hasta = $request->input('Hasta');
       
        $infraestructuras = DB::table('vehiculos')
        ->join('activos','vehiculos.activo_id', '=','activos.id')
        ->whereBetween('activos.created_at',[$desde,$hasta])  
        ->paginate(2);
        if(count($vehiculos)>0){
            return view('/vehiculos/listar', ['vehiculos' => $vehiculos]);  
        }
        else return 
       
        view('/vehiculo/listar', ['vehiculos' => $vehiculos])
        ->with('error','No se han encontrado registros para las fechas indicadas'); 
        
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
