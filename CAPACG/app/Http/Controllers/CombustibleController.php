<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combustible;
use App\Vehiculo;
use App\Dependencia;
use App\Inmueble;
use App\Activo;
use App\Colaborador;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
use Maatwebsite\Excel\Facades\Excel;

class CombustibleController extends Controller
{

    public function __construct()
    {           
        $this->middleware('Estandar')->except('show');
    }
    public function index()
    {
        $combustibles = DB::table('combustibles')
        ->select('combustibles.*')
        ->where('Estado','=','1')
        ->paginate(20);

        $usuarioActual=\Auth::user();
        if($usuarioActual->roles_id==1){
            return view('/combustible/listar', ['combustibles' => $combustibles]);
        }
        else{
            return view('/estandar/listarCombustibles', ['combustibles' => $combustibles]);
        }
                                  
    }

    public function getColaboradores()
    {
        $colaboradores = DB::table('colaboradores')
            ->join('users', 'colaboradores.user_id', '=', 'users.id')
            ->select('users.*', 'colaboradores.*', DB::raw("CONCAT(colaboradores.Cedula,' | ',users.name,' ',users.Apellido) as nombreCompleto"))
            ->where('users.Estado', '=', '1')
            ->pluck('nombreCompleto', 'colaboradores.id')
            ->prepend('selecciona un colaborador');

        return $colaboradores;
    }

    public function create()
    {
        $combustibles = Combustible::all();
        $vehiculos= Vehiculo:: all();
        $dependencias= Dependencia:: all();

        $usuarioActual=\Auth::user();

        $colaboradores = $this->getColaboradores();

        if($usuarioActual->roles_id==1){
            return view('/combustible/crear', ['vehiculos'=>$vehiculos,'dependencias'=>$dependencias, 'usuarios'=>$colaboradores]);
        }
        else{
            return view('/estandar/crearCombustible', ['vehiculos'=>$vehiculos,'dependencias'=>$dependencias,'usuarios'=>$colaboradores]);
        }
        
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'NoVaucher' => 'required|unique:combustibles,NoVaucher',
            'Monto' => 'required',
            'Numero' => 'required',                        
            'Fecha' => 'required',
            'Kilometraje' => 'required',
            'LitrosCombustible' => 'required',
            //'FuncionarioQueHizoCompra' => 'required',
            'Dependencia' => 'required',         
            'CodigoDeAccionDePlanPresupuesto' => 'required',
            'Vehiculo' => 'required',        
                       
        ],
    
        $messages = [
            'NoVaucher.required' => 'Debe definir el No Vaucher',
            'NoVaucher.unique' => 'Este número ya está en uso', 
            'Monto.required' => 'Debe definir el monto',
            'Fecha.required' => 'Debe definir la fecha',                        
            'Kilometraje.required' => 'Debe definir el kilometraje',            
            'LitrosCombustible.required' => 'Debe definir los litros de combustible',
            //'FuncionarioQueHizoCompra.required' => 'Debe definir el funcionario que hizo la compra',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'CodigoDeAccionDePlanPresupuesto.required' => 'Debe definir el código de acción de plan de presupuesto',
            'Vehiculo.required' => 'Debe definir el vehículo',
           
            
        ]
    );
    if ($validator->fails()) {
        return redirect('combustibles/create')
                    ->withInput()
                    ->withErrors($validator);
    }
    else{
        
        $combustible = new Combustible;
        $combustible->NoVaucher = $request['NoVaucher'];
        $combustible->Monto = $request['Monto'];
        $combustible->Numero = $request['Numero'];
        $combustible->Fecha = $request['Fecha'];
        $combustible->Kilometraje = $request['Kilometraje'];
        $combustible->LitrosCombustible = $request['LitrosCombustible'];
        $combustible->colaborador_id = $request['usuarios'];
        $combustible->dependencia_id = request('Dependencia');
        $combustible->CodigoDeAccionDePlanPresupuesto = $request['CodigoDeAccionDePlanPresupuesto'];
        $combustible->Estado=1;
        
        if ($request->hasFile('Foto')){ 

                $file = $request->file('Foto');  
                $file_route = time().'_'.$file->getClientOriginalName(); 
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                $combustible->Foto = $file_route; 
            
                }
        $combustible->vehiculo_id = $request['Vehiculo'];
        $combustible->save();
        
        return redirect('/combustibles')->with('message','Factura combustible correctamente creado');
    }
}

    public function show($id){

        
        $combustible = Combustible::find($id);
        $colaborador = Colaborador::find($combustible->colaborador_id);
        $usuario = User::find($colaborador->id);    
        $colaborador->user()->associate($usuario);
        $combustible->colaborador()->associate($colaborador);

        $vehiculo = Vehiculo::find($combustible->vehiculo_id);
        $combustible->vehiculo()->associate($vehiculo);
        $dependencia=Dependencia::find($combustible->dependencia_id);
        $combustible->dependencia()->associate($dependencia);
        $inmueble= Inmueble::where("id", "=",$vehiculo->inmueble_id)->first();
        $vehiculo->inmueble()->associate($inmueble);
        $activo = Activo::find($inmueble->id);
        $inmueble->activo()->associate($activo);
             
        return response()->json(['combustible'=>$combustible]);

    }

    public function edit($id)
    {
        $combustible = Combustible::find($id);
        $vehiculos= Vehiculo:: all();
   
        $Dependencia = Dependencia::find($combustible->dependencia_id);
        $combustible->dependencia()->associate($Dependencia);
        $Dependencias = DB::table('dependencias')->pluck('Dependencia', 'id');

        $Vehiculo = Dependencia::find($combustible->vehiculo_id);
        $combustible->vehiculo()->associate($Vehiculo);
        $Vehiculos = DB::table('vehiculos')->pluck('PlacaVehiculo', 'id');

        $usuarioActual=\Auth::user();

        $colaboradores = $this->getColaboradores();
        if($usuarioActual->roles_id==1){
            return view('/combustible/editar',compact('combustible'), ['Dependencias' => $Dependencias,'Vehiculos' => $Vehiculos, 'usuarios'=>$colaboradores]);
        }
        else{
            return view('/estandar/editarCombustible',compact('combustible'), ['Dependencias' => $Dependencias,'Vehiculos' => $Vehiculos, 'usuarios'=>$colaboradores]);
        }
        
        
    }

        
    public function update($id, Request $request)
    {
        
        $combustible = Combustible::find($id);

        $validator = Validator::make($request->all(), [
            'NoVaucher' => 'required|unique:combustibles,NoVaucher,'.$combustible->id,
            'Monto' => 'required',
            'Numero' => 'required',                        
            'Fecha' => 'required',
            'Kilometraje' => 'required',
            'LitrosCombustible' => 'required',
            //'FuncionarioQueHizoCompra' => 'required',
            'CodigoDeAccionDePlanPresupuesto' => 'required',      
                       
        ],
    
        $messages = [
            'NoVaucher.required' => 'Debe definir el No Vaucher',
            'Monto.required' => 'Debe definir el monto',
            'Numero.required' => 'Debe definir el numero',
            'Fecha.required' => 'Debe definir la fecha',                        
            'Kilometraje.required' => 'Debe definir el kilometraje',            
            'LitrosCombustible.required' => 'Debe definir los litros de combustible',
          //  'FuncionarioQueHizoCompra.required' => 'Debe definir el funcionario que hizo la compra',           
            'CodigoDeAccionDePlanPresupuesto.required' => 'Debe definir el código de acción de plan de presupuesto',
            
           
            
        ]
    );
    if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }
    else{
        $combustible->NoVaucher = request('NoVaucher');
        $combustible->Monto = request('Monto');
        $combustible->Numero = request('Numero');
        $combustible->Fecha = request('Fecha');
        $combustible->Kilometraje = request('Kilometraje');
        $combustible->LitrosCombustible = request('LitrosCombustible');
        $combustible->colaborador_id = request('usuarios');
        $combustible->dependencia_id = request('Dependencias');
        $combustible->CodigoDeAccionDePlanPresupuesto = request('CodigoDeAccionDePlanPresupuesto');
        
        

        if ($request->hasFile('Foto')){ 
            Storage::delete($combustible->Foto);

                            $file = $request->file('Foto');  
                            $file_route = time().'_'.$file->getClientOriginalName(); 
                            Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                            $combustible->Foto = $file_route; 
                        
        }
        $combustible->vehiculo_id = $request['Vehiculos'];
        $combustible->save();
        return redirect('/combustibles')->with('message','Factura combustible correctamente editado');
    }

}

    public function change($id)
    {
    	$combustible = Combustible::find($id);
              
        return response()->json(['combustible'=>$combustible]);
    }

    public function updatestate($id, Request $request)
    {
        
        $combustible = Combustible::find($id);
        $combustible->Estado = 0;    
        $combustible->save();
        return redirect('/combustibles');   
    }


    public function search(Request $request)
    {
        $combustibles = Combustible::buscar($request->get('buscar'))
        ->where('combustibles.Estado','=','1')->paginate(7);

        $usuarioActual=\Auth::user();
        if($usuarioActual->roles_id==1){
            return view('combustible/listar',compact('combustibles'));
        }
        else{
            return view('estandar/listarCombustibles',compact('combustibles'));
        }
        
    }
    public function filter()
    {

        $combustibles = DB::table('combustibles')
            ->select('combustibles.*')
            ->where('combustibles.Estado', '=', '0')
            ->paginate(10);

            $usuarioActual=\Auth::user();
            if($usuarioActual->roles_id==1){
                return view('/combustible/listar', ['combustibles' => $combustibles]);
            }
            else{
                return view('/combustible/listarCombustibles', ['combustibles' => $combustibles]);
            }

        
    }

    public function asignados(){
        
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $combustibles = DB::table('combustibles')                            
            
        ->select('combustibles.*')
        ->where('combustibles.colaborador_id','=', $colaborador->id)                        
            
        ->paginate(10);

        $usuarioActual=\Auth::user();
        if($usuarioActual->roles_id==1){
            return view('/combustible/listar', ['combustibles' => $combustibles]);
        }
        else{
            return view('/combustible/listarCombustibles', ['combustibles' => $combustibles]);
        }
        
        
    }
    public function filterDependencia(Request $request)
    {

        $name = $request->input('DependenciaFiltrar');
        $buscar = $request->input('BuscarDependencia');
        if ($buscar != null) {
            $combustibles = DB::table('combustibles')
                ->select('combustibles.*')
                ->where('combustibles.dependencia_id', '=', $name)
                ->paginate(10);
        } else {
            $combustibles = DB::table('combustibles')
                ->select('combustibles.*')
                ->where('combustibles.dependencia_id', '=', $name)

                ->paginate(10);
        }
        
        $usuarioActual=\Auth::user();
        if($usuarioActual->roles_id==1){
            return view('/combustible/listar', ['combustibles' => $combustibles]);
        }
        else{
            return view('/combustible/listarCombustibles', ['combustibles' => $combustibles]);
        }
        
    }
    
    public function filterDate(Request $request)
    {
        $desde = $request->input('Desde');
        $hasta = $request->input('Hasta');
        $combustibles = DB::table('combustibles')
            ->select('combustibles.*')
            ->whereBetween('combustibles.Fecha', [$desde, $hasta])
             ->paginate(10);

             $usuarioActual=\Auth::user();
             if($usuarioActual->roles_id==1){
                 return view('/combustible/listar', ['combustibles' => $combustibles]);
             }
             else{
                 return view('/combustible/listarCombustibles', ['combustibles' => $combustibles]);
             }

    }


        public function excel(){
            
            Excel::create('Facturas combustibles', function($excel) {
                
                           $excel->sheet('Activos', function($sheet) {
                
                                $combustibles = DB::table('combustibles')
                             //  ->join('colaboradores','combustibles.colaborador_id', '=','colaboradores.id')
                               ->join('dependencias','combustibles.dependencia_id', '=','dependencias.id')
                               ->select('combustibles.id','combustibles.NoVaucher','combustibles.Monto','combustibles.Numero','combustibles.Fecha','dependencias.Dependencia',
                               'combustibles.Kilometraje','combustibles.LitrosCombustible','combustibles.FuncionarioQueHizoCompra','combustibles.CodigoDeAccionDePlanPresupuesto')
                        
                               
                               ->get();
               
                               $combustibles = json_decode(json_encode($combustibles),true);
                               $sheet->freezeFirstRow();
                               $sheet->fromArray($combustibles);
                
                           });
                       })->export('xls');
                 }
}

