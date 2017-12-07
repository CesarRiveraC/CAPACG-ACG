<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Inmueble;
use App\Dependencia;
use App\Tipo;
use App\Colaborador;
use App\Sector;
use App\User;
use Illuminate\Support\Facades\Validator;
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
        ->where([['activos.Estado','=','1'],['activos.Identificador','=','2']])
        ->paginate(10);
        
        $colaboradores = DB::table('colaboradores')
        ->join('users','colaboradores.user_id','=','users.id')
        ->select('users.*','colaboradores.*',DB::raw("CONCAT(colaboradores.Cedula,' | ',users.name,' ',users.Apellido) as nombreCompleto"))
        ->where('users.Estado','=','1') 
        ->pluck('nombreCompleto','colaboradores.id')
        ->prepend('selecciona un colaborador');
      
        return view('/inmueble/listar', ['inmuebles' => $inmuebles, 'usuarios' =>$colaboradores]);
    }

    public function create()
    {
        $inmuebles = Inmueble::all();
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        $sectores= Sector:: all();
        return view('/inmueble/crear', compact('dependencias','tipos','sectores'));
       
    }

    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa',
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'Sector' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Serie' => 'required',         
            'Marca' => 'required',
            'Modelo' => 'required',        
            'EstadoUtilizacion' => 'required', 
            'EstadoFisico' => 'required',  
            'EstadoActivo' => 'required',         
            
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',
            'Sector.required' => 'Debe definir el sector',               
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Serie.required' => 'Debe definir la serie',
            'Marca.required' => 'Debe definir la marca',
            'Modelo.required' => 'Debe definir el modelo',
            'EstadoUtilizacion.required' => 'Debe definir el estado de utilización',
            'EstadoFisico.required' => 'Debe definir el estado físico',
            'EstadoActivo.required' => 'Debe definir el estado del activo',
            
        ]
    );


    if ($validator->fails()) {
        return redirect('inmuebles/create')
                    ->withInput()
                    ->withErrors($validator);
    }
    else{
            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->sector_id = $request['Sector'];
            $activo->tipo_id = $request['TipoActivo'];
            $activo->Programa = $request['Programa'];
            $activo->SubPrograma = $request['SubPrograma'];
            $activo->Color = $request['Color'];
            $activo->dependencia_id = $request['Dependencia'];
         
            $activo->Estado = 1;
            $activo->Identificador = 2;
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
            $inmueble->Marca = $request['Marca'];
            $inmueble->Modelo = $request['Modelo'];
            $inmueble->EstadoUtilizacion = $request['EstadoUtilizacion'];
            $inmueble->EstadoFisico = $request['EstadoFisico'];
            $inmueble->EstadoActivo = $request['EstadoActivo'];
            $inmueble->save();
       
            return redirect('/inmuebles')->with('message','Activo Inmueble correctamente creado');
            
           }
    }

    public function show($id){

        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);
        $dependencia = Dependencia::find($activo->dependencia_id);
        $activo->dependencia()->associate($dependencia);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->tipo()->associate($tipo);
        $sector= Sector:: find($activo->tipo_id);
        $activo->sector()->associate($sector);
        return response()->json(['inmueble'=>$inmueble]);

    }


    public function edit($id)
    {
    	$inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $Dependencias= Dependencia:: all();
        $dependencias= Dependencia::find($activo->dependencia_id);
        $Tipos= Tipo:: all();
        $tipos= Tipo:: find($activo->dependencia_id);;
        $inmueble->activo()->associate($activo);
        $Sectores= Sector:: all();
        $sectores= Sector:: find($activo->sector_id);

        return view('/inmueble/editar',compact('inmueble','dependencias','tipos','Dependencias','Tipos','Sectores','sectores'));
    }

    public function update($id, Request $request)
    {

        $inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);

        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa,'.$activo->id,
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'Sector' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Serie' => 'required',         
            'Marca' => 'required',
            'Modelo' => 'required',        
            'EstadoUtilizacion' => 'required', 
            'EstadoFisico' => 'required',  
            'EstadoActivo' => 'required',         
            
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Sector.required' => 'Debe definir el sector',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Serie.required' => 'Debe definir la serie',
            'Marca.required' => 'Debe definir la marca',
            'Modelo.required' => 'Debe definir el modelo',
            'EstadoUtilizacion.required' => 'Debe definir el estado de utilización',
            'EstadoFisico.required' => 'Debe definir el estado físico',
            'EstadoActivo.required' => 'Debe definir el estado del activo',
            
        ]
    );


    if ($validator->fails()) {
       return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
    }
    else{
        $activo->Placa = request('Placa');
        $activo->Descripcion = request('Descripcion');
        $activo->Programa = request('Programa');
        $activo->tipo_id = request('TipoActivo');
        $activo->sector_id = request('Sector');
        $activo->SubPrograma = request('SubPrograma');
        $activo->Color = request('Color');      
        $activo->dependencia_id = request('Dependencia');
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
        $inmueble->Marca = request('Marca');
        $inmueble->Modelo = request('Modelo');
        $inmueble->EstadoUtilizacion = request('EstadoUtilizacion');
        $inmueble->EstadoFisico = request('EstadoFisico');
        $inmueble->EstadoActivo = request('EstadoActivo');
        $inmueble->save();    

        return redirect('/inmuebles')->with('message','Activo Inmueble correctamente editado');
        }
    }

    public function change($id)
    {
    	$inmueble = Inmueble::find($id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);
        
        return response()->json(['inmueble'=>$inmueble]);
    }
    public function searchCollaborators($inmueble_id, $id, Request $request){

        $inmueble = Inmueble::find($inmueble_id);
        $activo = Activo::find($inmueble->activo_id);
        $inmueble->activo()->associate($activo);

        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $colaborador->user()->associate($usuario);

        // $usuario = User::find($id);        
        // $colaborador = Colaborador::where('user_id', '=', $usuario->id)->get();
        // $colaborador->user()->associate($usuario);
        
     return response()->json(['inmueble'=>$inmueble, 'colaborador'=>$colaborador]);
   }

    public function asignCollaborator($inmueble_id,$user_id, Request $request){

        $inmueble = Inmueble::find($inmueble_id);
        $activo = Activo::find($inmueble->activo_id);

        $colaborador= Colaborador::find($user_id); // no es necesario ya que el id ya viene pero esta como comprobacion que sea el id correcto.

        $activo->colaborador_id = $colaborador->id;    
       
        $activo->save();
     
        return redirect('/inmuebles');

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
        // ->where('activos.Estado','=','1')
        ->where([['activos.Estado','=','1'],['activos.Identificador','=','2']])
        ->paginate(10);
        return view('inmueble/listar',compact('inmuebles'));
    }

    public function asignar(Request $request)
    {
        
         $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->where('activos.Estado','=','1')
        ->paginate(7);
      
        return view('/inmueble/asignar', ['inmuebles' => $inmuebles]);
    }

    
    public function filter(){
     
        $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        //->where('activos.Estado','=', '0')
        ->select('activos.*','inmuebles.*')  
        ->where([['activos.Estado','=','0'],['activos.Identificador','=','2']])
        ->paginate(10);
 
        return view('/inmueble/listar', ['inmuebles' => $inmuebles]);
    }

    public function filterDependencia(Request $request){
        
        $name = $request->input('DependenciaFiltrar');
        $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->where([['activos.dependencia_id','=', $name],['activos.Identificador','=','2']])
        //->where('activos.dependencia_id','=', $name)  
        ->paginate(10);
        
        return view('/inmueble/listar', ['inmuebles' => $inmuebles]);
    }

    public function filterTipo(Request $request){
        
        $name = $request->input('TipoFiltrar');
       
        $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->where([['activos.tipo_id','=', $name],['activos.Identificador','=','2']])
       
        
        ->paginate(10);
        
        return view('/inmueble/listar', ['inmuebles' => $inmuebles]);
    }

    public function filterDate(Request $request){
        
        $desde = $request->input('Desde');
        $hasta = $request->input('Hasta');
       
        $inmuebles = DB::table('inmuebles')
        ->join('activos','inmuebles.activo_id', '=','activos.id')
        ->select('activos.*','inmuebles.*')
        ->whereBetween('activos.created_at',[$desde,$hasta])  
        ->where('activos.Identificador','=','2')
        
        ->paginate(10);
        if(count($inmuebles)>0){
            return view('/inmueble/listar', ['inmuebles' => $inmuebles]);  
        }
        else return 
        
        view('/inmueble/listar', ['inmuebles' => $inmuebles])
        ->with('error','No se han encontrado registros para las fechas indicadas'); 
        
    }
    

    public function excel(){

         Excel::create('Reporte Inmueble', function($excel) {
             
  
             $excel->sheet('Activos', function($sheet) {   
                  $inmuebles = DB::table('inmuebles')
                 ->join('activos','inmuebles.activo_id', '=','activos.id')
                 
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa','tipos.Tipo','activos.dependencia_id',
                 'activos.SubPrograma','activos.Color','inmuebles.Serie'
                 ,'inmuebles.EstadoUtilizacion','inmuebles.EstadoFisico','inmuebles.EstadoActivo',
                 'inmuebles.Marca','inmuebles.Modelo')
                //  ->where('activos.Estado','=','1') //cambiar el estado para generar el reporte
                ->where([['activos.Estado','=','1'],['activos.Identificador','=','2']])
                 ->get();
 
                 $inmuebles = json_decode(json_encode($inmuebles),true);
                 $sheet->freezeFirstRow();
                 $sheet->fromArray($inmuebles);
             });
         })->export('xls');
     }
    

}
