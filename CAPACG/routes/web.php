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

Route::group(['middleware' => 'auth'], function() {
    Route::resource('infraestructuras','InfraestructuraController');
    Route::resource('semovientes','SemovienteController');

    Route::get('combustibles/{id}/change','CombustibleController@change');
    Route::put('combustibles/{id}/updatestate','CombustibleController@updatestate');
    Route::get('combustibles/search','CombustibleController@search');
    
    Route::resource('combustibles','CombustibleController');


    Route::resource('vehiculos','VehiculoController');

    Route::get('inmuebles/{id}/change','InmuebleController@change');
    Route::put('inmuebles/{id}/updatestate','InmuebleController@updatestate');
    Route::get('inmuebles/search','InmuebleController@search');
    Route::resource('inmuebles','InmuebleController');  
    
    Route::resource('activos','Otro');  
    Route::resource('colaboradores','PruebaController');
    Route::get('/mensajeRechazado', function(){
        return view('mensajeRechazado');
    });
  });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('activos','ActivoController');

Route::group(['middleware' => 'Administrador'], function(){
    // agregar las rutas a las que no se desea que accese un usuario que no sea administrador      
});


