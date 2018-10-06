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
require __DIR__ . '/modulos/proveedores.php';
require __DIR__ . '/modulos/administracion.php';
Route::get('/', function () {

    $datos = \DB::table('tbdatosdecontacto')->get();
    return view('welcome',compact('datos'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// prueba , link para realizar prueba de las distintas vistas
Route::get('/prueba', function () {
    return view('layouts.proveedor');
});



