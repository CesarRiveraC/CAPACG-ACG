<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //todas las rutas al metodo show estan para todos los usuarios

    Route::get('infraestructuras/asignadas', 'InfraestructuraController@asignadas');
    Route::get('infraestructuras/filterSector', 'InfraestructuraController@filterSector');
    Route::get('infraestructuras/filterDate', 'InfraestructuraController@filterDate');
    Route::get('infraestructuras/filterTipo', 'InfraestructuraController@filterTipo');
    Route::get('infraestructuras/filterDependencia', 'InfraestructuraController@filterDependencia');
    Route::get('infraestructuras/filter', 'InfraestructuraController@filter');
    Route::get('infraestructuras/{id}/change', 'InfraestructuraController@change');
    Route::put('infraestructuras/{id}/updatestate', 'InfraestructuraController@updatestate');
    Route::get('infraestructuras/{infraestructura_id}/{user_id}/searchCollaborators', 'InfraestructuraController@searchCollaborators');
    Route::put('infraestructuras/{infraestructura_id}/{user_id}/asignCollaborator', 'InfraestructuraController@asignCollaborator');
    Route::get('infraestructuras/search', 'InfraestructuraController@search');
    Route::get('infraestructuras/excel', 'InfraestructuraController@excel');
    Route::resource('infraestructuras', 'InfraestructuraController');

    Route::get('semovientes/asignados', 'SemovienteController@asignados');
    Route::get('semovientes/filterSector', 'SemovienteController@filterSector');
    Route::get('semovientes/filterSector', 'SemovienteController@filterSector');
    Route::get('semovientes/filterDate', 'SemovienteController@filterDate');
    Route::get('semovientes/filterTipo', 'SemovienteController@filterTipo');
    Route::get('semovientes/filterDependencia', 'SemovienteController@filterDependencia');
    Route::get('semovientes/filter', 'SemovienteController@filter');
    Route::get('semovientes/{id}/change', 'SemovienteController@change');
    Route::put('semovientes/{id}/updatestate', 'SemovienteController@updatestate');
    Route::get('semovientes/{semoviente_id}/{user_id}/searchCollaborators', 'SemovienteController@searchCollaborators');
    Route::put('semovientes/{semoviente_id}/{user_id}/asignCollaborator', 'SemovienteController@asignCollaborator');
    Route::get('semovientes/search', 'SemovienteController@search');
    Route::get('semovientes/excel', 'SemovienteController@excel');
    Route::resource('semovientes', 'SemovienteController');

    //todas las rutas de combustibles tienen que estar disponibles para el rol administrador
    //y estandar, aparte de show que tiene que estar para todos

    Route::get('vehiculos/asignados', 'VehiculoController@asignados');
    Route::get('vehiculos/filterSector', 'VehiculoController@filterSector');
    Route::get('vehiculos/filterDate', 'VehiculoController@filterDate');
    Route::get('vehiculos/filterTipo', 'VehiculoController@filterTipo');
    Route::get('vehiculos/filterDependencia', 'VehiculoController@filterDependencia');
    Route::get('vehiculos/filter', 'VehiculoController@filter');
    Route::get('vehiculos/{id}/change', 'VehiculoController@change');
    Route::put('vehiculos/{id}/updatestate', 'VehiculoController@updatestate');
    Route::get('vehiculos/{vehiculo_id}/{user_id}/searchCollaborators', 'VehiculoController@searchCollaborators');
    Route::put('vehiculos/{vehiculo_id}/{user_id}/asignCollaborator', 'VehiculoController@asignCollaborator');
    Route::get('vehiculos/search', 'VehiculoController@search');
    Route::get('vehiculos/excel', 'VehiculoController@excel');
    Route::resource('vehiculos', 'VehiculoController');

    Route::get('inmuebles/asignados', 'InmuebleController@asignados');
    Route::get('inmuebles/filterSector', 'InmuebleController@filterSector');
    Route::get('inmuebles/filterDate', 'InmuebleController@filterDate');
    Route::get('inmuebles/filterTipo', 'InmuebleController@filterTipo');
    Route::get('inmuebles/filterDependencia', 'InmuebleController@filterDependencia');
    Route::get('inmuebles/filter', 'InmuebleController@filter');
    Route::get('inmuebles/excel', 'InmuebleController@excel');
    Route::get('inmuebles/{id}/change', 'InmuebleController@change');
    Route::put('inmuebles/{id}/updatestate', 'InmuebleController@updatestate');
    Route::get('inmuebles/{inmueble_id}/{user_id}/searchCollaborators', 'InmuebleController@searchCollaborators');
    Route::put('inmuebles/{inmueble_id}/{user_id}/asignCollaborator', 'InmuebleController@asignCollaborator');

    Route::get('inmuebles/search', 'InmuebleController@search');
    Route::resource('inmuebles', 'InmuebleController');

    Route::get('dependencias/{id}/change', 'DependenciaController@change');
    Route::put('dependencias/{id}/updatestate', 'DependenciaController@updatestate');
    Route::get('dependencias/search', 'DependenciaController@search');
    Route::resource('dependencias', 'DependenciaController');

    Route::get('tipos/{id}/change', 'TipoController@change');
    Route::put('tipos/{id}/updatestate', 'TipoController@updatestate');
    Route::get('tipos/search', 'TipoController@search');
    Route::resource('tipos', 'TipoController');

    Route::get('sectores/{id}/change', 'SectorController@change');
    Route::put('sectores/{id}/updatestate', 'SectorController@updatestate');
    Route::get('sectores/search', 'SectorController@search');
    Route::resource('sectores', 'SectorController');

    Route::resource('activos', 'Otro');
    Route::resource('colaboradores', 'PruebaController');
    Route::get('/mensajeRechazado', function () {
        return view('mensajeRechazado');
    });

    Route::get('combustibles/asignados', 'CombustibleController@asignados');
    Route::get('combustibles/filterDependencia', 'CombustibleController@filterDependencia');
    Route::get('combustibles/filterDate', 'CombustibleController@filterDate');
    Route::get('combustibles/filter', 'CombustibleController@filter');
    Route::get('combustibles/{id}/change', 'CombustibleController@change');
    Route::put('combustibles/{id}/updatestate', 'CombustibleController@updatestate');
    Route::get('combustibles/search', 'CombustibleController@search');
    Route::get('combustibles/excel', 'CombustibleController@excel');
    Route::resource('combustibles', 'CombustibleController');

    //

    Route::group(['middleware' => 'Administrador'], function () {
        Route::get('usuarios/search', 'UsuariosController@search');
        Route::get('usuarios/filter', 'UsuariosController@filter');
        Route::get('usuarios/{id}/change', 'UsuariosController@change');
        Route::put('usuarios/{id}/updatestate', 'UsuariosController@updatestate');
        Route::get('usuarios/excel', 'UsuariosController@excel');
        Route::resource('usuarios', 'UsuariosController');
    });

    
    
    //rutas para el rol colaborador
    Route::get('colaborador/searchCombustibles', 'ColaboradorController@searchCombustibles');
    Route::get('colaborador/searchVehiculos', 'ColaboradorController@searchVehiculos');
    Route::get('colaborador/searchSemovientes', 'ColaboradorController@searchSemovientes');
    Route::get('colaborador/searchInfraestructuras', 'ColaboradorController@searchInfraestructuras');
    Route::get('colaborador/searchInmuebles', 'ColaboradorController@searchInmuebles');
    Route::get('colaborador/inmueblesAsignados', 'ColaboradorController@inmueblesAsignados');
    Route::get('colaborador/infraestructurasAsignadas', 'ColaboradorController@infraestructurasAsignadas');
    Route::get('colaborador/semovientesAsignados', 'ColaboradorController@semovientesAsignados');
    Route::get('colaborador/vehiculosAsignados', 'ColaboradorController@vehiculosAsignados');
    Route::get('colaborador/combustiblesAsignados', 'ColaboradorController@combustiblesAsignados');

    //rutas para el rol estandar
    Route::group(['middleware' => ['Estandar']], function () {
        Route::get('estandar/inmueblesAsignados', 'EstandarController@inmueblesAsignados');
        Route::get('estandar/infraestructurasAsignadas', 'EstandarController@infraestructurasAsignadas');
        Route::get('estandar/semovientesAsignados', 'EstandarController@semovientesAsignados');
        Route::get('estandar/vehiculosAsignados', 'EstandarController@vehiculosAsignados');
        Route::get('estandar/combustiblesAsignados', 'EstandarController@combustiblesAsignados');
        Route::get('estandar/combustibles', 'EstandarController@combustibles');
        Route::get('estandar/vehiculos', 'EstandarController@vehiculos');
        Route::get('estandar/usuarios', 'EstandarController@usuarios');
    });
    //muchos de los metodos se repiten, el problema es que dependenciendo del usuario
    //se tiene que redirigir a determinada vista
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//Route::resource('activos','ActivoController');

//activos asignados a una persona
