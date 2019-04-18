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
    /*Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');*/
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/servicios', 'HomeController@servicios')->name('servicios');
Route::post('/servicios-guardar', 'HomeController@guardarServicio')->name('guardarServicio');
Route::get('/servicios-eliminar/{id}', 'HomeController@eliminarServicio')->name('eliminarServicio');
Route::get('/servicios-editar/{id}', 'HomeController@editarServicio')->name('editarServicio');
Route::post('/servicios-actualizar', 'HomeController@actualizarServicio')->name('actualizarServicio');

/*autos*/
Route::get('/vehiculos', 'HomeController@autos')->name('autos');
Route::post('/vehiculos-guardar', 'HomeController@guardarAuto')->name('guardarAuto');
Route::get('/vehiculos-eliminar/{id}', 'HomeController@eliminarAuto')->name('eliminarAuto');
Route::get('/vehiculos-editar/{id}', 'HomeController@editarAuto')->name('editarAuto');
Route::post('/vehiculos-actualizar', 'HomeController@actualizarAuto')->name('actualizarAuto');

/*ordenes*/
Route::get('/ordenes', 'HomeController@ordenes')->name('ordenes');
Route::get('/ordenes-imprimir/{id}', 'HomeController@imprimirOrden')->name('imprimirOrden');
Route::get('/ordenes-eliminar/{id}', 'HomeController@eliminarOrden')->name('eliminarOrden');
/*historiales*/
Route::get('/historial', 'HomeController@historial')->name('historial');

/*emplaedo*/
Route::post('/empleado-guardar', 'HomeController@registroEmpleado')->name('registroEmpleado');
Route::post('/orden-guardar', 'HomeController@ingresoOrden')->name('ingresoOrden');


