<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Inmueble;
use App\Colaborador;
use App\User;
use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Administrador')->except('index');
    }
    public function index()
    {
        $activos = Activo::paginate(2);
        
        return view('/activos/listar')->withActivos($activos);;
    }

    public function inmueblesAsignados(){

        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $inmuebles = DB::table('inmuebles')
        
    ->join('activos','inmuebles.activo_id', '=','activos.id')
    
    ->select('activos.*','inmuebles.*')
    ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','2']])
    ->paginate(10);
    //  return response()->json(['inmuebles'=>$inmuebles]);
    
    
    // ->paginate(10);
    return view('/colaborador/listarInmuebles', ['inmuebles' => $inmuebles]);

    }

    public function infraestructurasAsignadas(){
        
                $usuarioActual=\Auth::user();
                $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
                // $idUsuario = $usuarioActual->id;
                $infraestructuras = DB::table('infraestructuras')
                
            ->join('activos','infraestructuras.activo_id', '=','activos.id')
            
            ->select('activos.*','infraestructuras.*')
            ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','1']])
           
            
            
            ->paginate(10);
            // return response()->json(['infraestructuras'=>$infraestructuras]);
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
                
            // ->join('vehiculos','combustibles.vehiculo_id', '=','vehiculos.id')
            
            ->select('combustibles.*')
            ->where('combustibles.colaborador_id','=', $colaborador->id)
            
            
            
            ->paginate(10);
            return view('/colaborador/listarCombustibles', ['combustibles' => $combustibles]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activos = Activo::all();
        $dependencias= Dependencia:: all();
        return view('/activo/crear', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'Placa'=> 'required']); // agregar los damas campos requeridos

        $activo = Activo::create(request()->all());
			return redirect('/'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function edit(Activo $activo)
    {
        $activo = Activo::find($activo);
        //$activo = Activo::firstOrFail();
        //$activo = $activo->keyBy('id');
        //return View::make('editarActivo')->with('Activo', $activo);
        return view('/activo/editar',compact('activo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
        $activo = Activo::find($activo->id);
        $activo->Placa = $request['Placa'];
        $activo->Descripcion = $request['Descripcion'];
        $activo->Programa = $request['Programa'];
        $activo->SubPrograma = $request['SubPrograma'];
        $activo->Color = $request['Color'];
        $activo->Foto = $request['Foto'];
        $activo->save();
        return redirect('/activos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        //
    }
}
