<?php

namespace App\Http\Controllers;

use App\Activo;
use App\Dependencia;
use App\Sector;
use App\Semoviente;
use App\Tipo;
use App\User;
use App\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class SemovienteController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('Administrador')->except('show','index','create','edit','store','update',
        'search','asignados');
        $this->middleware('Estandar')->except('show');
    }

    public function index()
    {
        $semovientes = DB::table('semovientes')
            ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
            ->select('activos.*', 'semovientes.*')
            ->where([['activos.Estado', '=', '1'], ['activos.Identificador', '=', '3']])
        //->where('activos.Estado','=','1')
            ->paginate(10);

        $colaboradores = $this->getColaboradores();

        return view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios' => $colaboradores]);
    }

    public function getColaboradores()
    {
        $colaboradores = DB::table('colaboradores')
            ->join('users', 'colaboradores.user_id', '=', 'users.id')
            ->select('users.*', 'colaboradores.*', DB::raw("CONCAT(colaboradores.Cedula,' | ',users.name,' ',users.Apellido) as nombreCompleto"))
            ->where('users.Estado', '=', '1')
            ->pluck('nombreCompleto', 'colaboradores.id')
            ->prepend('Selecciona un colaborador');

        return $colaboradores;
    }

    public function searchCollaborators($semoviente_id, $id, Request $request)
    {
        $semoviente = Semoviente::find($semoviente_id);
        $activo = Activo::find($semoviente->activo_id);
        if($activo->colaborador_id!=null){
            $colaboradorAsignado = Colaborador::find($activo->colaborador_id);
            $usuarioAsignado = User::find($colaboradorAsignado->user_id);
            $colaboradorAsignado->user()->associate($usuarioAsignado);
            $activo->colaborador()->associate($colaboradorAsignado);
        }
        $semoviente->activo()->associate($activo);

        $colaborador = Colaborador::find($id);
        $usuario = User::find($colaborador->user_id);
        $colaborador->user()->associate($usuario);

        return response()->json(['semoviente' => $semoviente, 'colaborador' => $colaborador]);
    }

    public function asignCollaborator($semoviente_id, $user_id, Request $request)
    {
        $semoviente = Semoviente::find($semoviente_id);
        $activo = Activo::find($semoviente->activo_id);

        $colaborador = Colaborador::find($user_id); // no es necesario ya que el id ya viene pero esta como comprobacion que sea el id correcto.

        $activo->colaborador_id = $colaborador->id;

        $activo->save();

        return redirect('/semovientes');

    }

    public function create()
    {
        $semovientes = Semoviente::all();
        $dependencias = Dependencia::all();
        $tipos = Tipo::all();
        $sectores = Sector::all();
        return view('/semoviente/crear', compact('dependencias', 'tipos', 'sectores'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa',
            'Descripcion' => 'required',
            'TipoActivo' => 'required',
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Sector' => 'required',
            'Color' => 'required',
            'Dependencia' => 'required',
            'Raza' => 'required',
            'Edad' => 'required',
            'Peso' => 'required',

        ],

            $messages = [
                'Placa.required' => 'Debe definir el fierro',
                'Placa.unique' => 'La placa ya está en uso',
                'Descripcion.required' => 'Debe definir la descripción',
                'TipoActivo.required' => 'Debe definir la categoría del activo',
                'Programa.required' => 'Debe definir el programa',
                'SubPrograma.required' => 'Debe definir el subprograma',
                'Color.required' => 'Debe definir el color',
                'Sector.required' => 'Debe definir el sector',
                'Dependencia.required' => 'Debe definir la dependencia',
                'Raza.required' => 'Debe definir la raza',
                'Edad.required' => 'Debe definir la edad',
                'Peso.required' => 'Debe definir el peso',
            ]
        );

        if ($validator->fails()) {
            return redirect('semovientes/create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->sector_id = $request['Sector'];
            $activo->dependencia_id = $request['Dependencia'];
            $activo->tipo_id = $request['TipoActivo'];
            $activo->Programa = $request['Programa'];
            $activo->SubPrograma = $request['SubPrograma'];
            $activo->Color = $request['Color'];
            $activo->Estado = 1;
            $activo->Identificador = 3;
            $activo->Justificacion = 'N/A';
            

            if ($request->hasFile('Foto')) {

                $file = $request->file('Foto');
                $file_route = time() . '_' . $file->getClientOriginalName();
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath()));
                $activo->Foto = $file_route;

            }
            $activo->save();

            $semoviente = new Semoviente;
            $semoviente->activo_id = $activo->id;
            $semoviente->Raza = $request['Raza'];
            $semoviente->Edad = $request['Edad'];
            $semoviente->Peso = $request['Peso'];
            $semoviente->save();

            return redirect('/semovientes')->with('message', 'Activo Semoviente correctamente creado');
        }}

    public function show($id)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);

        if($activo->colaborador_id != null){
            $colaborador = Colaborador::find($activo->colaborador_id);
            $usuario = User::find($colaborador->user_id);    
            $colaborador->user()->associate($usuario);
            $activo->colaborador()->associate($colaborador);
        }
        
        $semoviente->activo()->associate($activo);
        $dependencia = Dependencia::find($activo->dependencia_id);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->dependencia()->associate($dependencia);
        $activo->tipo()->associate($tipo);
        $sector = Sector::find($activo->sector_id);
        $activo->sector()->associate($sector);
        return response()->json(['semoviente' => $semoviente]);

    }

    public function edit($id)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $semoviente->activo()->associate($activo);
        $Dependencia = Dependencia::find($activo->dependencia_id);
        $activo->dependencia()->associate($Dependencia);
        $tipo = Tipo::find($activo->tipo_id);
        $activo->tipo()->associate($tipo);
        $sector = Sector::find($activo->sector_id);
        $activo->sector()->associate($sector);

        $semoviente->activo()->associate($activo);

        $Dependencias = DB::table('dependencias')->pluck('Dependencia', 'id');
        $Tipos = DB::table('tipos')->pluck('Tipo', 'id');
        $Sectores = DB::table('sectores')->pluck('Sector', 'id');

        return view('/semoviente/editar', compact('semoviente', 'activo'), ['Dependencias' => $Dependencias, 'Tipos' => $Tipos, 'Sectores' => $Sectores]);
    }

    public function update($id, Request $request)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);

        $validator = Validator::make($request->all(), [
            'Placa' => 'required|unique:activos,Placa,' . $activo->id,
            'Descripcion' => 'required',
            'Programa' => 'required',
            'SubPrograma' => 'required',
            'Color' => 'required',
            'Raza' => 'required',
            'Edad' => 'required',
            'Peso' => 'required',

        ],

            $messages = [
                'Placa.required' => 'Debe definir el fierro',
                'Placa.unique' => 'Fierro ya está en uso',
                'Descripcion.required' => 'Debe definir la descripción',
                'Programa.required' => 'Debe definir el programa',
                'SubPrograma.required' => 'Debe definir el subprograma',
                'Color.required' => 'Debe definir el color',
                'Raza.required' => 'Debe definir la raza',
                'Edad.required' => 'Debe definir la edad',
                'Peso.required' => 'Debe definir el peso',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $activo->Placa = request('Placa');
            $activo->Descripcion = request('Descripcion');
            $activo->sector_id = request('Sectores');
            $activo->Programa = request('Programa');
            $activo->tipo_id = request('Tipos');
            $activo->SubPrograma = request('SubPrograma');
            $activo->Color = request('Color');
            $activo->dependencia_id = request('Dependencias');
            if ($request->hasFile('Foto')) {
                Storage::delete($activo->Foto);

                $file = $request->file('Foto');
                $file_route = time() . '_' . $file->getClientOriginalName();
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath()));
                $activo->Foto = $file_route;

            }
            $activo->save();

            $semoviente->activo_id = $activo->id;
            $semoviente->Raza = request('Raza');
            $semoviente->Edad = request('Edad');
            $semoviente->Peso = request('Peso');

            $semoviente->save();

            return redirect('/semovientes')->with('message', 'Activo Inmueble correctamente editado');
        }
    }

    public function change($id)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        $semoviente->activo()->associate($activo);

        return response()->json(['semoviente' => $semoviente]);

    }

    public function updatestate($id)
    {
        $semoviente = Semoviente::find($id);
        $activo = Activo::find($semoviente->activo_id);
        if ($activo->Estado == 1) {
            $activo->Estado = 0;
            $activo->Justificacion = request('Justificacion');;
        } else if ($activo->Estado == 0) {
            $activo->Estado = 1;
            $activo->Justificacion = request('Justificacion');
        }
        $activo->save();

        return redirect('/semovientes');
    }

    public function search(Request $request)
    {
        $semovientes = Semoviente::buscar($request->get('buscar'))
            ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
        // ->where('activos.Estado','=','1')
            ->select('activos.*', 'semovientes.*')
            ->where([['activos.Estado', '=', '1'], ['activos.Identificador', '=', '3']])
            ->paginate(10);
        return view('semoviente/listar', compact('semovientes'));
    }

    public function filter()
    {

        $semovientes = DB::table('semovientes')
            ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
            ->select('activos.*', 'semovientes.*')
            ->where([['activos.Estado', '=', '0'], ['activos.Identificador', '=', '3']])
            ->paginate(10);

        return view('/semoviente/listar', ['semovientes' => $semovientes]);
    }

    public function asignados(){
        
        $usuarioActual=\Auth::user();
        $colaborador= Colaborador::where("user_id", "=",$usuarioActual->id)->first();
        $semovientes = DB::table('semovientes')
                
        ->join('activos','semovientes.activo_id', '=','activos.id')
            
        ->select('activos.*','semovientes.*')
        ->Where([['activos.colaborador_id','=', $colaborador->id],['activos.Identificador','=','3']])                        
        ->where('activos.Estado', '=', '1')   
        ->paginate(10);

        $colaboradores = $this->getColaboradores();
        return view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios' => $colaboradores]);
        
    }

    public function filterDependencia(Request $request)
    {

        $name = $request->input('DependenciaFiltrar');
        $buscar = $request->input('BuscarDependencia');

        if ($buscar) {

            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*')
                ->Where([['activos.dependencia_id', '=', $name], ['activos.Placa', 'LIKE', '%' . $buscar . '%'], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
                ->paginate(10);
        } else {
            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*')
                ->where([['activos.dependencia_id', '=', $name], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
            //    ->where('activos.dependencia_id','=', $name)
                ->paginate(10);
        }

        $colaboradores = $this->getColaboradores();

        return view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios' => $colaboradores]);
    }

    public function filterTipo(Request $request)
    {

        $name = $request->input('TipoFiltrar');
        $buscar = $request->input('BuscarTipo');

        if ($buscar != null) {
            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*')
                ->Where([['activos.tipo_id', '=', $name], ['activos.Placa', 'LIKE', '%' . $buscar . '%'], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
                ->paginate(10);
        } else {
            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*')
            //    ->where('activos.tipo_id','=', $name)
                ->where([['activos.tipo_id', '=', $name], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
                ->paginate(10);
        }

        $colaboradores = $this->getColaboradores();

        return view('/semoviente/listar', ['semovientes' => $semovientes,'usuarios'=>$colaboradores]);
    }

    public function filterDate(Request $request)
    {

        $desde = $request->input('Desde');
        $hasta = $request->input('Hasta');

        $semovientes = DB::table('semovientes')
            ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
            ->select('activos.*', 'semovientes.*')
            ->whereBetween('activos.created_at', [$desde, $hasta])
            ->where('activos.Identificador', '=', '3')
            ->where('activos.Estado', '=', '1')
            ->paginate(10);

            $colaboradores = $this->getColaboradores();

        if (count($semovientes) > 0) {
            return view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios'=>$colaboradores]);
        } else {
            return

            view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios'=> $colaboradores])
                ->with('error', 'No se han encontrado registros para las fechas indicadas');
        }

    }

    public function filterSector(Request $request)
    {

        $name = $request->input('SectorFiltrar');
        $buscar = $request->input('BuscarSector');

        if ($buscar != null) {
            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*')
                ->Where([['activos.sector_id', '=', $name], ['activos.Placa', 'LIKE', '%' . $buscar . '%'], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
                ->paginate(10);
        } else {
            $semovientes = DB::table('semovientes')
                ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                ->select('activos.*', 'semovientes.*s')
            //    ->where('activos.tipo_id','=', $name)
                ->where([['activos.sector_id', '=', $name], ['activos.Identificador', '=', '3']])
                ->where('activos.Estado', '=', '1')
                ->paginate(10);
        }

        $colaboradores = $this->getColaboradores();

        return view('/semoviente/listar', ['semovientes' => $semovientes, 'usuarios'=> $colaboradores]);
    }

    public function excel()
    {

        Excel::create('Reporte Semovientes', function ($excel) {

            $excel->sheet('Activos', function ($sheet) {

                $semovientes = DB::table('semovientes')
                    ->join('activos', 'semovientes.activo_id', '=', 'activos.id')
                    ->join('tipos', 'activos.tipo_id', '=', 'tipos.id')
                    ->join('sectores', 'activos.sector_id', '=', 'sectores.id')
                    ->join('dependencias', 'activos.dependencia_id', '=', 'dependencias.id')
                    ->leftJoin('colaboradores', 'activos.colaborador_id', '=', 'colaboradores.id')
                    ->select('activos.id', 'activos.Placa', 'activos.Descripcion', 'sectores.Sector', 'tipos.Tipo', 'activos.Programa', 'dependencias.Dependencia',
                        'activos.SubPrograma', 'activos.Color', 'semovientes.Raza', 'semovientes.Edad'
                        , 'semovientes.Peso', 'colaboradores.Cedula')
                    ->where([['activos.Estado', '=', '1'], ['activos.Identificador', '=', '3']])
                    ->get();

                $semovientes = json_decode(json_encode($semovientes), true);
                $sheet->freezeFirstRow();
                $sheet->fromArray($semovientes);

            });
        })->export('xls');

    }

}
