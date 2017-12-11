<?php

namespace App\Http\Controllers;

use App\Colaborador;
use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Input;
use Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {

        $this->middleware('Administrador')->except('show');
    }

    public function index()
    {
        $colaboradores = DB::table('colaboradores')
            ->join('users', 'colaboradores.user_id', '=', 'users.id')
            ->join('roles', 'users.roles_id', '=', 'roles.id')
            ->select('users.*', 'roles.*', 'colaboradores.*')
            ->where('users.Estado', '=', '1')
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'Apellido' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'Cedula' => 'required|unique:colaboradores,Cedula',
            'PuestoDeTrabajo' => 'required',
            'LugarDeTrabajo' => 'required',

        ],

            $messages = [
                'name.required' => 'Debe definir el nombre de usuario.',
                'Apellido.required' => 'Debe definir el Apellido del usuario.',
                'email.required' => 'Debe definir el correo electronico del usuario.',
                'email.unique' => 'El correo electrónico ya está en uso.',
                'password.required' => 'Debe definir una contraseña.',
                'password.min' => 'La contraseña debe tener al menos 6 carácteres.',
                'password_confirmation.required' => 'Debe confirmar la contraseña',
                'password_confirmation.same' => 'Las contraseñas no coinciden, inténtalo de nuevo.',
                'Cedula.required' => 'Debe definir el numero de cédula.',
                'Cedula.unique' => 'La cédula ya ha sido registrada',
                'PuestoDeTrabajo.required' => 'Debe definir un puesto de trabajo.',
                'LugarDeTrabajo.required' => 'Debe definir un lugar de trabajo.',

            ]
        );

        if ($validator->fails()) {
            return redirect('usuarios/create')
                ->withInput()
                ->withErrors($validator);
        } else {
            $usuario = new User;
            $usuario->name = $request['name'];
            $usuario->Apellido = $request['Apellido'];
            $usuario->email = $request['email'];
            $usuario->password = bcrypt($request['password']);            
            $usuario->roles_id = 3;
            $usuario->Estado = 1;

            $usuario->save();

            $colaborador = new Colaborador;
            $colaborador->user_id = $usuario->id;
            $colaborador->Cedula = $request['Cedula'];
            $colaborador->PuestoDeTrabajo = $request['PuestoDeTrabajo'];
            $colaborador->LugarDeTrabajo = $request['LugarDeTrabajo'];
            $colaborador->Telefono = $request['Telefono'];
            $colaborador->Estado = 1;

            $colaborador->save();

            return redirect('/usuarios')->with('message', 'El usuario ha sido creado con éxito.');
        }
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
        $rol = Rol::find($usuario->roles_id);
        $rol->user()->associate($usuario);
        $colaborador->user()->associate($usuario);

        return response()->json(['colaborador' => $colaborador,'rol'=>$rol]);

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
        $rol = Rol::find($usuario->roles_id);
        $rol->user()->associate($usuario);
        $colaborador->user()->associate($usuario);

        $roles = DB::table('roles')->pluck('Rol', 'id');

        return view('/Usuario/editar', compact('colaborador', 'usuario', 'rol'), ['roles' => $roles]);
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

        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $rol = Rol::find($usuario->roles_id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'Apellido' => 'required',
            'email' => 'required|unique:users,email,' . $usuario->id,
            'Cedula' => 'required|unique:colaboradores,Cedula,' . $colaborador->id,
            'PuestoDeTrabajo' => 'required',
            'LugarDeTrabajo' => 'required',

        ],

            $messages = [
                'name.required' => 'Debe definir el nombre de usuario.',
                'Apellido.required' => 'Debe definir el Apellido del usuario.',
                'email.required' => 'Debe definir el correo electronico del usuario.',
                'email.unique' => 'El correo electrónico ya está en uso.',
                'password.required' => 'Debe definir una contraseña.',
                'password.min' => 'La contraseña debe tener al menos 6 carácteres.',
                'password_confirmation.required' => 'Debe confirmar la contraseña',
                'password_confirmation.same' => 'Las contraseñas no coinciden, inténtalo de nuevo.',                                
                'Cedula.required' => 'Debe definir el numero de cédula.',
                // 'Cedula.unique' => 'La cédula ya ha sido registrada',
                'PuestoDeTrabajo.required' => 'Debe definir un puesto de trabajo.',
                'LugarDeTrabajo.required' => 'Debe definir un lugar de trabajo.',

            ]
        );

        $validator->sometimes('password', 'required|min:6', function ($input) {
           return $input['setNewPassword'];
        });

        $validator->sometimes('password_confirmation', 'required|same:password', function ($input) {
            return $input['setNewPassword'];
         });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $message = 'La Informacion del usuario ha sido actualizada';            
            $colaborador = Colaborador::find($id);
            $usuario = User::find($colaborador->user_id);

            $usuario->name = $request['name'];
            $usuario->Apellido = $request['Apellido'];
            $usuario->email = $request['email'];
              if($request['password']!=null && $request->has('setNewPassword')){
                $usuario->password = bcrypt(request('password'));                
              }             
            $usuario->roles_id = $request['roles'];
            $usuario->save();
            $colaborador->Cedula = $request['Cedula'];
            $colaborador->PuestoDeTrabajo = $request['PuestoDeTrabajo'];
            $colaborador->LugarDeTrabajo = $request['LugarDeTrabajo'];
            $colaborador->Telefono = $request['Telefono'];
            $colaborador->save();

            return redirect('/usuarios')->with('message', $message);
        }

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

        return response()->json(['colaborador' => $colaborador]);
    }

    public function updatestate($id, Request $request)
    {

        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);

        if ($usuario->Estado == 1 && $colaborador->Estado == 1) {

            $usuario->Estado = 0;
            $colaborador->Estado = 0;

        } else if ($usuario->Estado == 0 && $colaborador->Estado == 0) {

            $usuario->Estado = 1;
            $colaborador->Estado = 1;
        }

        $colaborador->save();
        $usuario->save();

        return redirect('/usuarios');
    }

    public function search(Request $request)
    {
        // $colaboradores = DB::buscar($request->get('buscar'))

        // ->join('users','colaboradores.user_id', '=','users.id')
        // ->select('users.*','colaboradores.*')
        // ->where('users.Estado','=','0')
        // ->paginate(20);
        // return view('Usuario/listar',compact('colaboradores'));
    }

    public function filter()
    {
        $colaboradores = DB::table('colaboradores')
            ->join('users', 'colaboradores.user_id', '=', 'users.id')
            ->join('roles', 'users.roles_id', '=', 'roles.id')
            ->select('users.*', 'roles.*', 'colaboradores.*')
            ->where('users.Estado', '=', '0')
            ->paginate(20);

        return view('/Usuario/listar', ['colaboradores' => $colaboradores]);
    }

}
