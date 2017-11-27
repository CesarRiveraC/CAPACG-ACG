<?php

namespace App\Http\Controllers;

use App\Semoviente;
use App\Activo;
use App\Dependencia;
use App\Tipo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        ->where('activos.Estado','=','1') 
        ->paginate(20);

        
        return view('/semoviente/listar', ['semovientes' => $semovientes]);
    }

    public function create()
    {
        $semovientes = Semoviente::all();
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        return view('/semoviente/crear', compact('dependencias','tipos'));
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa',
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Raza' => 'required',         
            'Edad' => 'required',
            'Peso' => 'required',        
           
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir el fierro',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Raza.required' => 'Debe definir la raza',
            'Edad.required' => 'Debe definir la edad',
            'Peso.required' => 'Debe definir el peso',
        ]
    );


    if ($validator->fails()) {
        return redirect('semovientes/create')
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

            $semoviente = new Semoviente;
            $semoviente->activo_id =  $activo->id;
            $semoviente->Raza = $request['Raza'];
            $semoviente->Edad = $request['Edad'];
            $semoviente->Peso = $request['Peso'];
            $semoviente->save();

			return redirect('/semovientes')->with('message','Activo Semoviente correctamente creado'); 
    }}

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
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
    
        return view('/semoviente/editar',compact('semoviente','dependencias','tipos'));
   
    }
    
    public function update($id, Request $request)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);

        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa,'.$activo->id,
            'Descripcion' => 'required',
            'TipoActivo' => 'required',                        
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Raza' => 'required',         
            'Edad' => 'required',
            'Peso' => 'required',        
           
        ],
    
        $messages = [
            'Placa.required' => 'Debe definir el fierro',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'Raza.required' => 'Debe definir la raza',
            'Edad.required' => 'Debe definir la edad',
            'Peso.required' => 'Debe definir el peso',
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

        $semoviente->activo_id =  $activo->id;
        $semoviente->Raza = request('Raza');
        $semoviente->Edad = request('Edad');
        $semoviente->Peso = request('Peso');
       
        $semoviente->save();    

        return redirect('/semovientes')->with('message','Activo Inmueble correctamente editado');
        }
    }
   

    public function change($id)
    {
    	$semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $semoviente->activo()->associate($activo);
        
        return response()->json(['semoviente'=>$semoviente]);
        
    }

    public function updatestate($id)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $activo->Estado = 0;    
        $activo->save();

        return redirect('/semovientes');
    }

    public function search(Request $request)
    {
        $semovientes = Semoviente::buscar($request->get('buscar'))
        ->join('activos','semovientes.activo_id', '=','activos.id')
        ->where('activos.Estado','=','1')->paginate(20);
        return view('semoviente/listar',compact('semovientes'));
    }



     
    public function filter(){
        
           $semovientes = DB::table('semovientes')
           ->join('activos','semovientes.activo_id', '=','activos.id')
           ->where('activos.Estado','=', '0')  
           ->paginate(20);
    
           return view('/semoviente/listar', ['semovientes' => $semovientes]);
       }
   
       public function filterDependencia(Request $request){
           
           $name = $request->input('DependenciaFiltrar');
           $semovientes = DB::table('semovientes')
           ->join('activos','semovientes.activo_id', '=','activos.id')
           ->where('activos.dependencia_id','=', $name)  
           ->paginate(20);
           
           return view('/semoviente/listar', ['semovientes' => $semovientes]);
       }
   
       public function filterTipo(Request $request){
           
           $name = $request->input('TipoFiltrar');
          
           $semovientes = DB::table('semovientes')
           ->join('activos','semovientes.activo_id', '=','activos.id')   
           ->where('activos.tipo_id','=', $name)  
           ->paginate(20);
           
           return view('/semoviente/listar', ['semovientes' => $semovientes]);
       }
   
       public function filterDate(Request $request){
           
           $desde = $request->input('Desde');
           $hasta = $request->input('Hasta');
          
           $semovientes = DB::table('semovientes')
           ->join('activos','semovientes.activo_id', '=','activos.id')
           ->whereBetween('activos.created_at',[$desde,$hasta])   
           ->paginate(20);
           if(count($semovientes)>0){
               return view('/semoviente/listar', ['semovientes' => $semovientes]);  
           }
           else return 
           
           view('/semoviente/listar', ['semovientes' => $semovientes])
           ->with('error','No se han encontrado registros para las fechas indicadas'); 
           
       }
       

    public function excel(){
        
 
         Excel::create('Reporte Semovientes', function($excel) {
  
             $excel->sheet('Activos', function($sheet) {
  
                  $semovientes = DB::table('semovientes')
                 ->join('activos','semovientes.activo_id', '=','activos.id')
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa','activos.tipo_id','activos.dependencia_id',
                 'activos.SubPrograma','activos.Color','semovientes.Raza','semovientes.Edad'
                 ,'semovientes.Peso')
                 ->where('activos.Estado','=','0') //cambiar el estado para generar el reporte
                 ->get();
 
                 $semovientes = json_decode(json_encode($semovientes),true);
                 $sheet->freezeFirstRow();
                 $sheet->fromArray($semovientes);
  
             });
         })->export('xls');
 
     }



}
