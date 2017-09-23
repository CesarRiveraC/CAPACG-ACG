<?php

namespace App\Http\Controllers;

use App\Semoviente;
use Illuminate\Http\Request;

class SemovienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semovientes = Semoviente::all();
        return view('welcome', compact('semovientes')); // por mientras se manda a la vista welcome
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semovientes = Semoviente::all();
        
        //return view('crearSemoviente'); colocar el nombre de la vista
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

        $semoviente = Semoviente::create(request()->all());
			return redirect('/'); // por el momento esta asi, ya despues se manda a una vista diferente
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
}
