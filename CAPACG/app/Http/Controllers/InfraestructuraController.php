<?php

namespace App\Http\Controllers;

use App\Infraestructura;
use App\Activo;
use App\Dependencia;
use App\Tipo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Storage;

class InfraestructuraController extends Controller
{
    //
    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }
    public function index()
    {
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where([['activos.Estado','=','1'],['activos.Identificador','=','1']])  
        ->paginate(4);
    
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
       
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where([['activos.tipo_id','=', $name],['activos.Identificador','=','1']])
        // ->where('activos.dependencia_id','=', $name)  
        //->where('activos.Estado','LIKE', '%' .$activo->Estado. '%' )
        
        ->paginate(2);
        
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructuras]);
    }

    public function filterTipo(Request $request){
        
        $name = $request->input('TipoFiltrar');
       
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->where([['activos.tipo_id','=', $name],['activos.Identificador','=','1']]) 
        //->where('activos.tipo_id','=', $name)  
       
        
        ->paginate(2);
        
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
        return view('/infraestructura/crear', compact('dependencias','tipos'));
        //return ( json_encode ($dependencias));
        //return response()->json(['dependencias'=>$dependencias]);
       
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'NumeroFinca'=> 'required']); // agregar los damas campos requeridos
        
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

    public function show($id){
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        $dependencia = Dependencia::find($activo->dependencia_id);
        $activo->dependencia()->associate($dependencia);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->tipo()->associate($tipo);
        return response()->json(['infraestructura'=>$infraestructura]);

    }

    public function edit($id)
    {
    	$infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $infraestructura->activo()->associate($activo);
        $dependencias= Dependencia:: all();
        $tipos= Tipo:: all();
        //$infraestructura = DB::table('infraestructuras')
        //->join('activos', 'infraestructuras.activo_id', '=', 'activos.id')
        //->select('activos.*', 'infraestructuras.*')
        //->get();
        //return response()->json(['infraestructura'=>$infraestructura]);
        return view('/infraestructura/editar',compact('infraestructura','dependencias','tipos'));
    }
    
    public function update($id, Request $request)
    {
        $infraestructura = Infraestructura::find($id);
        $activo = Activo::find($infraestructura->activo_id);
        $activo->Placa = request('Placa');
        $activo->Descripcion = request('Descripcion');
        $activo->Programa = request('Programa');
        $activo->SubPrograma = request('SubPrograma');
        $activo->Color = request('Color');
        $activo->dependencia_id = $request['Dependencia'];
        $activo->tipo_id = $request['TipoActivo'];

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
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa',
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
