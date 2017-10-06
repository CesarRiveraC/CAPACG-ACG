<?php

namespace App\Http\Controllers;

use App\Infraestructura;
use App\Activo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class InfraestructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infraestructuras = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->get();

        $infraestructurasPaginadas = $this->paginate($infraestructuras->toArray(),5);
        return view('/infraestructura/listar', ['infraestructuras' => $infraestructurasPaginadas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infraestructuras = Infraestructura::all();
        
        return view('/infraestructura/crear');
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
        
        $activo = new Activo;
        $activo->Placa = $request['Placa'];
        $activo->Descripcion = $request['Descripcion'];
        $activo->Programa = $request['Programa'];
        $activo->SubPrograma = $request['SubPrograma'];
        $activo->Color = $request['Color'];
        
        if ($request->file('Foto')->isValid()){ 

                $file = $request->file('Foto');  
                $file_route = time().'_'.$file->getClientOriginalName(); 
                Storage::disk('public')->put($file_route, file_get_contents($file->getRealPath() )); 
                $activo->Foto = $file_route; 
            
                }
        $activo->save();

        $infraestructura = new Infraestructura;
        $infraestructura->activo_id =  $activo->id;
        $infraestructura->NumeroFinca = $request['NumeroFinca'];
        $infraestructura->AreaConstruccion = $request['AreaConstruccion'];
        $infraestructura->AreaTerreno = $request['AreaTerreno'];
        $infraestructura->AnoFabricacion = $request['AnoFabricacion'];
        $infraestructura->save();

        return redirect('/infraestructuras'); // por el momento esta asi, ya despues se manda a una vista diferente
            
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
    public function edit(Infraestructura $id)
    {
        $infraestructura = Infraestructura::find($id);
        //$activo = Activo::find($infra->id);

       $infraestructura = DB::table('infraestructuras')
        ->join('activos','infraestructuras.activo_id', '=','activos.id')
        ->select('activos.*','infraestructuras.*')
        ->get();
        return view('/infraestructura/editar')->with('infraestructuras', $infraestructura);
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
        //$request = $this->getIdOfRequest($request);
        //$infraestructura = Infraestructura::find($infraestructura);
        $infraestructura = Infraestructura::with('Activo')->find($id);

        $infraestructura->NumeroFinca = $request['NumeroFinca'];
        $infraestructura->AreaConstruccion = $request['AreaConstruccion'];
        $infraestructura->AreaTerreno = $request['AreaTerreno'];
        $infraestructura->AnoFabricacion = $request['AnoFabricacion'];
       
        return redirect('/infraestructura/listar');

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
