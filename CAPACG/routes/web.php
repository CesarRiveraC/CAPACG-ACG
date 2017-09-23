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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('colaboradores','PruebaController');
Route::resource('activos','ActivoController');
Route::resource('combustibles','CombustibleController');
Route::resource('infraestructuras','InfraestructuraController');
Route::resource('inmuebles','InmuebleController');
Route::resource('semovientes','SemovienteController');
Route::resource('vehiculos','VehiculoController');
