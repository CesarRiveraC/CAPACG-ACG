<?php

namespace App\Http\Controllers;

use App\Infraestructura;
use App\Activo;
use App\Dependencia;
use App\Tipo;
use App\Vehiculo;
use App\Sector;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Support\Facades\Validator;

class InfraestructuraController extends Controller
{
    //
    public function __construct()
    {   
        //cambio de index a show ya que es la ruta que tiene
        //que estar disponible para todos
        $this->middleware('Administrador')->except('show');
    }
    public function index()
    {
        $infraestructuras = DB::table('infraestructuras')
        
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where([['activos.Estado','=','1'],['activos.Identificador','=','1']])  
        ->paginate(10);
    
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filter(){
        //$fitro = $request['TipoActivo'];
        // $name = $request->input('TipoActivo');
        // $activo = new Activo;
        // $activo->Estado = request('TipoActivo');
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where('activos.Estado','=', '0')  
        //->where('activos.Estado','LIKE', '%' .$activo->Estado. '%' )
        
        ->paginate(2);
        //return response()->json(['activo'=>$name]);
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filterDependencia(Request $request){
        
        $name = $request->input('DependenciaFiltrar');
        $buscar = $request->input('BuscarDependencia');
        if($buscar != null){
             $infraestructuras = DB::table('infraestructuras')
        
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->Where([['activos.dependencia_id','=', $name],['activos.Placa', 'LIKE', '%' .$buscar. '%'],['activos.Identificador','=','1']])
        
        ->paginate(10);
        }
        else{
              $infraestructuras = DB::table('infraestructuras')
            
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->Where([['activos.dependencia_id','=', $name],['activos.Identificador','=','1']])
        
        
        
        ->paginate(10);
        }
        //return response()->json(['infraestructura'=>$buscar]);
        // $infraestructuras = DB::table('infraestructuras')
        // ->buscar($request->get('buscar'))
        // ->join('activos','infraestructuras.activo_id', '=','activos.id')
        // ->select('activos.*','infraestructuras.*')
        // ->Where([['activos.tipo_id','=', $name],['activos.Placa', 'LIKE', '%' .$buscar. '%']])
        // ->orwhere([['activos.tipo_id','=', $name],['activos.Identificador','=','1']])
        // // ->where('activos.dependencia_id','=', $name)  
        // //->where('activos.Estado','LIKE', '%' .$activo->Estado. '%' )
        
        // ->paginate(10);
        
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filterTipo(Request $request){
        
        $name = $request->input('TipoFiltrar');
        $buscar = $request->input('BuscarTipo');
        if($buscar != null){
            $infraestructuras = DB::table('infraestructuras')
            ->join('activos','infraestructuras.activo_id', '=','activos.id')
            ->select('activos.*','infraestructuras.*')
            ->Where([['activos.tipo_id','=', $name],['activos.Placa', 'LIKE', '%' .$buscar. '%'],['activos.Identificador','=','1']])
            ->paginate(10);
        }
        else{
            $infraestructuras = DB::table('infraestructuras')
            ->join('activos','infraestructuras.activo_id', '=','activos.id')
            ->select('activos.*','infraestructuras.*')
            ->where([['activos.tipo_id','=', $name],['activos.Identificador','=','1']]) 
           
            
            ->paginate(10);
        }
        
        
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filterSector(Request $request)
    {

        $name = $request->input('SectorFiltrar');
        $buscar = $request->input('BuscarSector');
        if($buscar != null){
            $infraestructuras = DB::table('infraestructuras')
            ->join('activos','infraestructuras.activo_id', '=','activos.id')
            ->select('activos.*','infraestructuras.*')
            ->Where([['activos.sector_id','=', $name],['activos.Placa', 'LIKE', '%' .$buscar. '%'],['activos.Identificador','=','1']])
            ->paginate(10);
        }
        else{
            $infraestructuras = DB::table('infraestructuras')
            ->join('activos', 'infraestructuras.activo_id', '=', 'activos.id')
            ->select('activos.*', 'infraestructuras.*')
            ->where([['activos.sector_id', '=', $name], ['activos.Identificador', '=', '1']])

            ->paginate(10);
        }
        

        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filterDate(Request $request){
        
        $desde = $request->input('Desde');
        $hasta = $request->input('Hasta');
       
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->whereBetween('activos.created_at',[$desde,$hasta])  
        ->where('activos.Identificador','=','1')
        
        ->paginate(2);
        if(count($infraestructuras)>0){
            return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);  
        }
        else return 
        //response()->json(['infraestructuras' => $infraestructuras]);
        view('/infraestructura/listar', ['infraestructuras' => $infraestructuras])
        ->with('error','No se han encontrado registros para las fechas indicadas'); 
        
    }

    public function create()
    {
        //$infraestructuras = Infraestructura::all();
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        $vehiculos = Vehiculo::all();
        $sectores = Sector::all();
        
        return view('/infraestructura/crear', compact('dependencias','tipos','vehiculos','sectores'));
        //return ( json_encode ($dependencias));
        //return response()->json(['dependencias'=>$dependencias]);
       
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa',
            'Descripcion' => 'required',
            'TipoActivo' => 'required', 
            'Sector' => 'required',                        
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'NumeroFinca' => 'required',         
            'AreaConstruccion' => 'required',
            'AreaTerreno' => 'required',        
            'AnoFabricacion' => 'required', 
                   
            
        ],
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Placa.unique' => 'La placa ya está en uso', 
            'Sector.required' => 'Debe definir el sector',
            'Descripcion.required' => 'Debe definir la descripción',
            'TipoActivo.required' => 'Debe definir la categoría del activo',                        
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'NumeroFinca.required' => 'Debe definir el nùmero de finca',
            'AreaConstruccion.required' => 'Debe definir el área de construcción',
            'AreaTerreno.required' => 'Debe definir el área del terreno',
            'AnoFabricacion.required' => 'Debe definir el año de fabricación',
            
            
        ]
    );
    if ($validator->fails()) {
        return redirect('infraestructuras/create')
                    ->withInput()
                    ->withErrors($validator);
    }

    else{
    
        $activo = new Activo;
        $activo->Placa = $request['Placa'];
        $activo->Descripcion = $request['Descripcion'];
        $activo->Programa = $request['Programa'];
        $activo->SubPrograma = $request['SubPrograma'];
        $activo->Color = $request['Color'];
        $activo->Estado = 1;
        $activo->Identificador = 1;
        $activo->dependencia_id = $request['Dependencia'];
        $activo->tipo_id = $request['TipoActivo'];
        $activo->sector_id = $request['Sector'];
        
        if ($request->hasFile('Foto')){ 

                $file = $request->file('Foto');  
                $file_route = time().'_'.$file->getClientOriginalName(); 
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                $activo->Foto = $file_route; 
            
                }
        $activo->save();

        $infraestructura = new Infraestructura;
        $infraestructura->activo_id =  $activo->id;
        $infraestructura->NumeroFinca = $request['NumeroFinca'];
        $infraestructura->AreaConstruccion = $request['AreaConstruccion'];
        $infraestructura->AreaTerreno = $request['AreaTerreno'];
        $infraestructura->AnoFabricacion = $request['AnoFabricacion'];
        $infraestructura->save();

        return redirect('/infraestructuras')->with('message','Infraestructura correctamente creada'); 
            } 
    }

    public function show($id){
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        $dependencia = Dependencia::find($activo->dependencia_id);
        $activo->dependencia()->associate($dependencia);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->tipo()->associate($tipo);
        $sector= Sector:: find($activo->sector_id);   
        $activo->sector()->associate($sector);
        return response()->json(['infraestructura'=>$infraestructura]);

    }

    public function edit($id)
    {
    	$infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        $Dependencia = Dependencia::find($activo->dependencia_id);
        $activo->dependencia()->associate($Dependencia);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->tipo()->associate($tipo);
        $sector = Sector::find($activo->sector_id);
        $activo->sector()->associate($sector);

        $infraestructura->activo()->associate($activo);

        $Dependencias = DB::table('dependencias')->pluck('Dependencia', 'id');
        $Tipos = DB::table('tipos')->pluck('Tipo', 'id');
        $Sectores = DB::table('sectores')->pluck('Sector', 'id');

        return view('/infraestructura/editar', compact('infraestructura', 'activo'), ['Dependencias' => $Dependencias,'Tipos'=>$Tipos,'Sectores'=>$Sectores]);
    }
    
    public function update($id, Request $request)
    {
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);

        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa,'.$activo->id,
            'Descripcion' => 'required',                     
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'NumeroFinca' => 'required',         
            'AreaConstruccion' => 'required',
            'AreaTerreno' => 'required',        
            'AnoFabricacion' => 'required',         
            
        ],
        $messages = [
            'Placa.required' => 'Debe definir la placa',
            'Placa.unique' => 'La placa ya está en uso', 
            'Descripcion.required' => 'Debe definir la descripción',
            'Programa.required' => 'Debe definir el programa',            
            'SubPrograma.required' => 'Debe definir el subprograma',
            'Color.required' => 'Debe definir el color',            
            'NumeroFinca.required' => 'Debe definir el nùmero de finca',
            'AreaConstruccion.required' => 'Debe definir el área de construcción',
            'AreaTerreno.required' => 'Debe definir el área del terreno',
            'AnoFabricacion.required' => 'Debe definir el año de fabricación',
            
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
        $activo->tipo_id = request('Tipos');
        $activo->sector_id = request('Sectores');
        $activo->SubPrograma = request('SubPrograma');
        $activo->Color = request('Color');
        $activo->dependencia_id = request('Dependencias');
       
        if ($request->hasFile('Foto')){ 
            Storage::delete($activo->Foto);

                            $file = $request->file('Foto');  
                            $file_route = time().'_'.$file->getClientOriginalName(); 
                            Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                            $activo->Foto = $file_route; 
                        
        }

        $activo->save();

        $infraestructura->activo_id =  $activo->id;
        $infraestructura->NumeroFinca = request('NumeroFinca');
        $infraestructura->AreaConstruccion = request('AreaConstruccion');
        $infraestructura->AreaTerreno = request('AreaTerreno');
        $infraestructura->AnoFabricacion = request('AnoFabricacion');
        $infraestructura->save();
        return redirect('/infraestructuras');
    }
    }

    public function change($id)
    {
    	$infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        
        return response()->json(['infraestructura'=>$infraestructura]);
        
    }

    public function updatestate($id)
    {
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $activo->Estado = 0; 
        $activo->save();

        return redirect('/infraestructuras');
    }

    public function search(Request $request)
    {
        $infraestructuras = Infraestructura::buscar($request->get('buscar'))
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where([['activos.Estado','=','1'],['activos.Identificador','=','1']]) 
        ->paginate(10);
        return view('infraestructura/listar',compact('infraestructuras'));
    }


    public function excel(){
        
 
         Excel::create('Reporte Infraestructura', function($excel) {
  
             $excel->sheet('Activos', function($sheet) {
  
                 //$infraestructuras = Activo::all();
                  $infraestructuras = DB::table('infraestructuras')
                 ->join('activos','infraestructuras.activo_id', '=','activos.id')
                 ->join('tipos','activos.tipo_id', '=','tipos.id')
                 ->join('sectores','activos.sector_id', '=','sectores.id')
                 ->join('dependencias','activos.dependencia_id', '=','dependencias.id')
                 ->select('activos.id','activos.Placa','activos.Descripcion','sectores.Sector','tipos.Tipo','activos.Programa','dependencias.Dependencia',
                 'activos.SubPrograma','activos.Color','infraestructuras.NumeroFinca','infraestructuras.AreaConstruccion'
                 ,'infraestructuras.AreaTerreno','infraestructuras.AnoFabricacion')
                 ->where([['activos.Estado','=','1'],['activos.Identificador','=','1']]) 
                 ->get();
 
                 $infraestructuras = json_decode(json_encode($infraestructuras),true);
                 $sheet->freezeFirstRow();
                 $sheet->fromArray($infraestructuras);
  
             });
         })->export('xls');
 
     }
}
