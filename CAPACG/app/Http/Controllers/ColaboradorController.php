<?php

namespace App\Http\Controllers;
use App\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradorController extends Controller
{
    //Creado para administrar al usuario con rol colaborador

    public function inmueblesAsignados(){
        
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $inmuebles = DB::table('inmuebles')
                
        ->join('activos','inmuebles.activo_id', '=','activos.id')
            
        ->select('activos.*','inmuebles.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
        ->paginate(10);                                
            
        return view('/colaborador/listarInmuebles', ['inmuebles' => $inmuebles]);
        
    }
        
    public function searchInmuebles(Request $request){
        $buscar = $request->input('Buscar');
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $inmuebles = DB::table('inmuebles')
                        
        ->join('activos','inmuebles.activo_id', '=','activos.id')
                    
        ->select('activos.*','inmuebles.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
        ->where('activos.Placa','=', $buscar)
        ->paginate(10);                                
                    
        return view('/colaborador/listarInmuebles', ['inmuebles' => $inmuebles]);
                
    }

    public function searchInfraestructuras(Request $request){
        $buscar = $request->input('Buscar');
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $infraestructuras = DB::table('infraestructuras')
                        
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
                    
        ->select('activos.*','infraestructuras.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
        ->where('activos.Placa','=', $buscar)
        ->paginate(10);                                
                    
        return view('/colaborador/listarInfraestructuras', ['infraestructuras' => $infraestructuras]);
                
    }

    public function searchSemovientes(Request $request){
        $buscar = $request->input('Buscar');
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $semovientes = DB::table('semovientes')
                        
        ->join('activos','semovientes.activo_id', '=','activos.id')
                    
        ->select('activos.*','infraestructuras.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
        ->where('activos.Placa','=', $buscar)
        ->paginate(10);                                
                    
        return view('/colaborador/listarSemovientes', ['semovientes' => $semovientes]);
                
    }

    public function searchVehiculos(Request $request){
        $buscar = $request->input('Buscar');
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $vehiculos = DB::table('vehiculos')
        ->join('inmuebles','vehiculos.inmueble_id', '=','inmuebles.id')
        ->join('activos', 'inmuebles.activo_id', '=', 'activos.id')
        ->select('activos.*','inmuebles.*','vehiculos.*')
                            
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
        ->where('activos.Placa','=', $buscar)
        ->paginate(10);                                
                    
        return view('/colaborador/listarVehiculos', ['vehiculos' => $vehiculos]);
                
    }

    public function searchCombustibles(Request $request){
        $buscar = $request->input('Buscar');
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $combustibles = DB::table('combustibles')                                        
        
        ->select('combustibles.*')
        ->where('combustibles.colaborador_id','=', $colaborador->id)  
        ->where('activos.Placa','=', $buscar)
        ->paginate(10);                                
                    
        return view('/colaborador/listarCombustibles', ['combustibles' => $combustibles]);
                
    }
    
    public function infraestructurasAsignadas(){
                
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();        
        $infraestructuras = DB::table('infraestructuras')
                        
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
                    
        ->select('activos.*','infraestructuras.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','1']])
                   
                    
                    
        ->paginate(10);
                    
        return view('/colaborador/listarInfraestructuras', ['infraestructuras' => $infraestructuras]);
                
    }
        
    public function semovientesAsignados(){
                
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $semovientes = DB::table('semovientes')
                        
        ->join('activos','semovientes.activo_id', '=','activos.id')
                    
        ->select('activos.*','semovientes.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','3']])                                                            
        ->paginate(10);
        return view('/colaborador/listarSemovientes', ['semovientes' => $semovientes]);
                
    }
        
    public function vehiculosAsignados(){
                
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $vehiculos = DB::table('vehiculos')
        ->join('inmuebles','vehiculos.inmueble_id', '=','inmuebles.id')
        ->join('activos', 'inmuebles.activo_id', '=', 'activos.id')
        ->select('activos.*','inmuebles.*','vehiculos.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','4']])                                        
                    
        ->paginate(10);
        return view('/colaborador/listarVehiculos', ['vehiculos' => $vehiculos]);
                
    }
            
    public function combustiblesAsignados(){
                
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $combustibles = DB::table('combustibles')                                        
                    
        ->select('combustibles.*')
        ->where('combustibles.colaborador_id','=', $colaborador->id)                                                            
        ->paginate(10);
        return view('/colaborador/listarCombustibles', ['combustibles' => $combustibles]);
                
    }
            
}
