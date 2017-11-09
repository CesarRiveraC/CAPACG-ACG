<?php

namespace App\Http\Controllers;

use App\Semoviente;
use App\Activo;
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
        ->where('activos.Estado','=','0') //hay que definir bien cual es el que se va a utilizar
        ->paginate(10);

        
        return view('/semoviente/listar', ['semovientes' => $semovientes]);
    }

    public function create()
    {
        $semovientes = Semoviente::all();
        
        return view('/semoviente/crear'); 
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'Raza'=> 'required']); // agregar los damas campos requeridos

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

            $semoviente = new Semoviente;
            $semoviente->activo_id =  $activo->id;
            $semoviente->Raza = $request['Raza'];
            $semoviente->Edad = $request['Edad'];
            $semoviente->Peso = $request['Peso'];
            $semoviente->save();

			return redirect('/semovientes'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

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
        
        return view('/semoviente/editar',compact('semoviente'));
    }
    
    public function update($id, Request $request)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
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

        $semoviente->activo_id =  $activo->id;
        $semoviente->Raza = request('Raza');
        $semoviente->Edad = request('Edad');
        $semoviente->Peso = request('Peso');
        $semoviente->save();
        return redirect('/semovientes');
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
      
        $activo->Estado = 1;    

       
        $activo->save();

     
        return redirect('/semovientes');
    }

    public function excel(){
        
 
         Excel::create('Reporte Semovientes', function($excel) {
  
             $excel->sheet('Activos', function($sheet) {
  
                 //$infraestructuras = Activo::all();
                  $semovientes = DB::table('semovientes')
                 ->join('activos','semovientes.activo_id', '=','activos.id')
                 ->select('activos.id','activos.Placa','activos.Descripcion','activos.Programa',
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
