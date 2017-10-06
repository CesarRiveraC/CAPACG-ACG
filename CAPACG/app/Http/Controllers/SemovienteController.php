<?php

namespace App\Http\Controllers;

use App\Semoviente;
use App\Activo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemovienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semovientes = DB::table('semovientes')
        ->join('activos','semovientes.activo_id', '=','activos.id')
        ->select('activos.*','semovientes.*')
        ->get();

        $semovientesPaginados = $this->paginate($semovientes->toArray(),5);
        return view('/semoviente/listar', ['semovientes' => $semovientesPaginados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semovientes = Semoviente::all();
        
        return view('/semoviente/crear'); 
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
            'Raza'=> 'required']); // agregar los damas campos requeridos

            $activo = new Activo;
            $activo->Placa = $request['Placa'];
            $activo->Descripcion = $request['Descripcion'];
            $activo->Programa = $request['Programa'];
            $activo->SubPrograma = $request['SubPrograma'];
            $activo->Color = $request['Color'];
            $activo->Foto = $request['Foto'];
            $activo->save();

            $semoviente = new Semoviente;
            $semoviente->activo_id =  $activo->id;
            $semoviente->Raza = $request['Raza'];
            $semoviente->Edad = $request['Edad'];
            $semoviente->Peso = $request['Peso'];
            $semoviente->save();

			return redirect('/semovientes'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semoviente  $semoviente
     * @return \Illuminate\Http\Response
     */
    public function show(Semoviente $semoviente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semoviente  $semoviente
     * @return \Illuminate\Http\Response
     */
    public function edit(Semoviente $semoviente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semoviente  $semoviente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semoviente $semoviente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semoviente  $semoviente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semoviente $semoviente)
    {
        //
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
