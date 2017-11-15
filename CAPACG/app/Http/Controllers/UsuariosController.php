<?php

namespace App\Http\Controllers;
use App\Colaborador;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Storage;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){

        $this->middleware('Administrador')->except('index');
    }

    public function index()
    {
        $colaboradores = DB::table('colaboradores')
        ->join('users','colaboradores.user_id', '=','users.id')
        ->select('users.*','colaboradores.*')
        ->paginate(10);
        
        return view('/Usuario/listar', ['colaboradores' => $colaboradores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colaboradores = Colaborador::all();

        return view('Usuario/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this-> validate(request(),[
        //     'Nombre'=>'required',
        //     'password' => 'required',
        //     'password_confirmation' => 'required'
        //     //se deben especificar el resto de campos requeridos
        // ]);

        $usuario = new User;
        $usuario->name = $request['name'];
        $usuario->Apellido = $request['Apellido'];
        $usuario->email = $request['email'];
        $usuario->password = bcrypt($request['password']);   
        $usuario->Rol = 2;
        $usuario->Estado = 1;                

        $usuario->save();

        $colaborador = new Colaborador;
        $colaborador->user_id = $usuario->id;
        $colaborador->Cedula = $request['Cedula'];
        $colaborador->Direccion = $request['Direccion'];
        $colaborador->PuestoDeTrabajo = $request['PuestoDeTrabajo'];
        $colaborador->LugarDeTrabajo = $request['LugarDeTrabajo'];
        $colaborador->Telefono = $request['Telefono'];
        $colaborador->Estado = 1;
        
        $colaborador->save();

        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $colaborador->user()->associate($usuario);
    
        return response()->json(['colaborador'=>$colaborador]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $colaborador->user()->associate($usuario);

        return view('/Usuario/editar', compact('colaborador','usuario'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //nombre apellido correo, nueva contraseña , confirmar contraseña
        $colaborador = Colaborador::find($id);        
        $usuario = User::find($colaborador->user_id);
       

        // if (isset ( $_POST['submit']) ) 
        // { 
        //    if ( $_POST['password'] == $_POST['password_confirmation']) 
        //    { 
            $usuario->name = request('name');
            $usuario->Apellido = request('Apellido');
            $usuario->email = request('email');
            $usuario->password = bcrypt(request('password'));
            //falta confirmar contrase;a
            $activo->remember_token = '';
            $usuario->save();
    
            $colaborador->Cedula = request('Cedula');
            $colaborador->Direccion = request('Direccion');
            $colaborador->PuestoDeTrabajo = request('PuestoDeTrabajo');
            $colaborador->LugarDeTrabajo = request('LugarDeTrabajo');
            $colaborador->Telefono = request('Telefono');
            $colaborador->save();
            return redirect('/usuarios');
        // } 
        //    else 
        //    { 
        //     return redirect('/mensajeRechazado');
            
        //     } 
        // }  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change($id)
    {
    	$colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $colaborador->user()->associate($usuario);
        
        return response()->json(['colaborador'=>$colaborador]);
    }
}
