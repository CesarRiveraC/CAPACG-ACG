<?php

namespace App\Http\Controllers;

use App\Combustible;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combustibles = Combustible::all();
        return view('welcome', compact('combustibles')); // por mientras se manda a la vista welcome
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $combustibles = Combustible::all();
        
        //return view('crearCombustibles'); colocar el nombre de la vista
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
            'Fecha'=> 'required']); // agregar los damas campos requeridos

        $activo = Activo::create(request()->all());
			return redirect('/'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function show(Combustible $combustible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function edit(Combustible $combustible)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combustible $combustible)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combustible $combustible)
    {
        //
    }
}
