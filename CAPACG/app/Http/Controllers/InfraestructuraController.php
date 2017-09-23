<?php

namespace App\Http\Controllers;

use App\Infraestructura;
use Illuminate\Http\Request;

class InfraestructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infraestructuras = Infraestructura::all();
        return view('welcome', compact('infraestructuras')); // por mientras se manda a la vista welcome
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infraestructuras = Infraestructura::all();
        
        //return view('crearInfraestructura'); colocar el nombre de la vista
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
            'NumeroFinca'=> 'required']); // agregar los damas campos requeridos

        $infraestructura = Infraestructura::create(request()->all());
			return redirect('/'); // por el momento esta asi, ya despues se manda a una vista diferente
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infraestructura  $infraestructura
     * @return \Illuminate\Http\Response
     */
    public function show(Infraestructura $infraestructura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infraestructura  $infraestructura
     * @return \Illuminate\Http\Response
     */
    public function edit(Infraestructura $infraestructura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infraestructura  $infraestructura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infraestructura $infraestructura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infraestructura  $infraestructura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infraestructura $infraestructura)
    {
        //
    }
}
