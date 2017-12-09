<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combustible;
use App\Vehiculo;
use App\Dependencia;
use App\Inmueble;
use App\Activo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
use Maatwebsite\Excel\Facades\Excel;

class CombustibleController extends Controller
{

    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }
    public function index()
    {
        $combustibles = DB::table('combustibles')
        ->select('combustibles.*')
        ->where('Estado','=','1')
        ->paginate(20);

        
        return view('/combustible/listar', ['combustibles' => $combustibles]);
    }


    public function create()
    {
        $combustibles = Combustible::all();
        $vehiculos= Vehiculo:: all();
        $dependencias= Dependencia:: all();
        return view('/combustible/crear', compact('vehiculos','dependencias'));
    }


    public function store(Request $request)
    {

    //     $validator = Validator::make($request->all(), [
    //         'NoVaucher' => 'required|unique:combustibles,NoVaucher',
    //         'Monto' => 'required',
    //         'Numero' => 'required',                        
    //         'Fecha' => 'required',
    //         'Kilometraje' => 'required',
    //         'LitrosCombustible' => 'required',
    //         'FuncionarioQueHizoCompra' => 'required',
    //         'Dependencia' => 'required',         
    //         'CodigoDeAccionDePlanPresupuesto' => 'required',
    //         'Vehiculo' => 'required',        
                       
    //     ],
    
    //     $messages = [
    //         'NoVaucher.required' => 'Debe definir el No Vaucher',
    //         'NoVaucher.unique' => 'Este número ya está en uso', 
    //         'Monto.required' => 'Debe definir el monto',
    //         'Fecha.required' => 'Debe definir la fecha',                        
    //         'Kilometraje.required' => 'Debe definir el kilometraje',            
    //         'LitrosCombustible.required' => 'Debe definir los litros de combustible',
    //         'FuncionarioQueHizoCompra.required' => 'Debe definir el funcionario que hizo la compra',            
    //         'Dependencia.required' => 'Debe definir la dependencia',
    //         'CodigoDeAccionDePlanPresupuesto.required' => 'Debe definir el código de acción de plan de presupuesto',
    //         'Vehiculo.required' => 'Debe definir el vehículo',
           
            
    //     ]
    // );
    // if ($validator->fails()) {
    //     return redirect('combustibles/create')
    //                 ->withInput()
    //                 ->withErrors($validator);
    // }
    // else{
        
        $combustible = new Combustible;
        $combustible->NoVaucher = $request['NoVaucher'];
        $combustible->Monto = $request['Monto'];
        $combustible->Numero = $request['Numero'];
        $combustible->Fecha = $request['Fecha'];
        $combustible->Kilometraje = $request['Kilometraje'];
        $combustible->LitrosCombustible = $request['LitrosCombustible'];
        $combustible->FuncionarioQueHizoCompra = $request['FuncionarioQueHizoCompra'];
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
//}

    public function show($id){

        
        $combustible = Combustible::find($id);

        $vehiculo = Vehiculo::find($combustible->vehiculo_id);
        $combustible->vehiculo()->associate($vehiculo);
        $dependencia=Dependencia::find($combustible->dependencia_id);
        $combustible->dependencia()->associate($dependencia);
        $inmueble= Inmueble::where("id", "=",$vehiculo->inmueble_id)->first();
        // $inmueble-> Inmueble::find($vehiculo->inmueble_id);
        $vehiculo->inmueble()->associate($inmueble);
        $activo = Activo::find($inmueble->id);
        $inmueble->activo()->associate($activo);
             
        return response()->json(['combustible'=>$combustible]);

    }

    public function edit($id)
    {
    	$combustible = Combustible::find($id);
        $vehiculos= Vehiculo:: all();
        $dependencias= Dependencia:: all();
        return view('/combustible/editar',compact('combustible','vehiculos', 'dependencias'));
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
            'FuncionarioQueHizoCompra' => 'required',
            'Dependencia' => 'required',         
            'CodigoDeAccionDePlanPresupuesto' => 'required',
            'Vehiculo' => 'required',        
                       
        ],
    
        $messages = [
            'NoVaucher.required' => 'Debe definir el No Vaucher',
            'Monto.required' => 'Debe definir el monto',
            'Numero.required' => 'Debe definir el numero',
            'Fecha.required' => 'Debe definir la fecha',                        
            'Kilometraje.required' => 'Debe definir el kilometraje',            
            'LitrosCombustible.required' => 'Debe definir los litros de combustible',
            'FuncionarioQueHizoCompra.required' => 'Debe definir el funcionario que hizo la compra',            
            'Dependencia.required' => 'Debe definir la dependencia',
            'CodigoDeAccionDePlanPresupuesto.required' => 'Debe definir el código de acción de plan de presupuesto',
            'Vehiculo.required' => 'Debe definir el vehículo',
           
            
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
        $combustible->FuncionarioQueHizoCompra = request('FuncionarioQueHizoCompra');
        $combustible->dependencia_id = request('Dependencia');
        $combustible->CodigoDeAccionDePlanPresupuesto = request('CodigoDeAccionDePlanPresupuesto');
        
        

        if ($request->hasFile('Foto')){ 
            Storage::delete($combustible->Foto);

                            $file = $request->file('Foto');  
                            $file_route = time().'_'.$file->getClientOriginalName(); 
                            Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                            $combustible->Foto = $file_route; 
                        
        }
        $combustible->vehiculo_id = $request['Vehiculo'];
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
        return view('combustible/listar',compact('combustibles'));
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

