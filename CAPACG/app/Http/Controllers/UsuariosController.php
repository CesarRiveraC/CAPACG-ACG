<?php

namespace App\Http\Controllers;
use App\user;
use App\colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct(){

        $this->middleware('Administrador');
    }

    public function index()
    {
        $colaboradores = DB::table('colaboradores')
        ->join('users','colaboradores.user_id', '=','users.id')
        ->select('users.*','colaboradores.*')
        ->get();

        $colaboradoresPaginados = $this->paginate($colaboradores->toArray(),5);
        return view('/Usuario/listar', ['colaboradores' => $colaboradoresPaginados]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
