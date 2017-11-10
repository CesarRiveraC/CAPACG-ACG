<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combustible;
use App\Vehiculo;
use Illuminate\Support\Facades\DB;
use Storage;
use Maatwebsite\Excel\Facades\Excel;

class CombustibleController extends Controller
{

    public function __construct()
    {   
        $this->middleware('Administrador')->except('index');
    }
    public function index(Request $request)
    {

     $combustibles = DB::table('combustibles')
      ->select('combustibles.*')
      ->where('combustibles.Estado','=','1')
      ->paginate();
    return view('/combustible/listar', ['combustibles' => $combustibles]);

      
    }

    public function create()
    {
        $combustibles = Combustible::all();
        
        return view('/combustible/crear');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'NoVaucher'=> 'required']); // agregar los damas campos requeridos
        
        $combustible = new Combustible;
        $combustible->NoVaucher = $request['NoVaucher'];
        $combustible->Monto = $request['Monto'];
        $combustible->Numero = $request['Numero'];
        $combustible->Fecha = $request['Fecha'];
        $combustible->Kilometraje = $request['Kilometraje'];
        $combustible->LitrosCombustible = $request['LitrosCombustible'];
        $combustible->FuncionarioQueHizoCompra = $request['FuncionarioQueHizoCompra'];
        $combustible->Dependencia = $request['Dependencia'];
        $combustible->CodigoDeAccionDePlanPresupuesto = $request['CodigoDeAccionDePlanPresupuesto'];
        $combustible->Estado=1;
        
        if ($request->hasFile('Foto')){ 

                $file = $request->file('Foto');  
                $file_route = time().'_'.$file->getClientOriginalName(); 
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                $combustible->Foto = $file_route; 
            
                }
        $combustible->save();
        
        return redirect('/combustibles'); // por el momento esta asi, ya despues se manda a una vista diferente
            
    }

    public function show($id){
        $combustible = Combustible::find($id);
  
        return response()->json(['combustible'=>$combustible]);

    }

    public function edit($id)
    {
    	$combustible = Combustible::find($id);
     
        return view('/combustible/editar',compact('combustible'));
    }

        
    public function update($id, Request $request)
    {
        $combustible = Combustible::find($id);
        $combustible->NoVaucher = request('NoVaucher');
        $combustible->Monto = request('Monto');
        $combustible->Numero = request('Numero');
        $combustible->Fecha = request('Fecha');
        $combustible->Kilometraje = request('Kilometraje');
        $combustible->LitrosCombustible = request('LitrosCombustible');
        $combustible->FuncionarioQueHizoCompra = request('FuncionarioQueHizoCompra');
        $combustible->Dependencia = request('Dependencia');
        $combustible->CodigoDeAccionDePlanPresupuesto = request('CodigoDeAccionDePlanPresupuesto');
        
        

        if ($request->hasFile('Foto')){ 
            Storage::delete($combustible->Foto);

                            $file = $request->file('Foto');  
                            $file_route = time().'_'.$file->getClientOriginalName(); 
                            Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                            $combustible->Foto = $file_route; 
                        
        }

        $combustible->save();
        return redirect('/combustibles');
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
        $combustibles = Combustible::buscar($request->get('buscar'))->where('combustibles.Estado','=','1')->paginate();
        return view('combustible/listar',compact('combustibles'));
    }

    
    public function excel(){
        
                 Excel::create('Reporte Facturas de Combustible', function($excel) {
          
                     $excel->sheet('Facturas', function($sheet) {   
                          $combustibles = DB::table('combustibles')
                          ->select('id','NoVaucher','Monto','Numero',
                         'Fecha','Estado','Kilometraje','LitrosCombustible'
                         ,'FuncionarioQueHizoCompra','Dependencia','Foto','CodigoDeAccionDePlanPresupuesto')
                         ->where('Estado','=','1') //cambiar el estado para generar el reporte
                         ->get();
         
                         $combustibles = json_decode(json_encode($combustibles),true);
                         $sheet->freezeFirstRow();
                         $sheet->fromArray($combustibles);
                     });
                 })->export('xls');
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
