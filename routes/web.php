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
require __DIR__ . '/modulos/estaticas.php';
Route::get('/', function () {

    //$datos = \DB::table('tbdatosdecontacto')->get();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'InicioSecionController@index')->name('index');

// prueba , link para realizar prueba de las distintas vistas


Route::get('/tienda', function () {
    return view('modulos.usuario.store');
});

route::get('/prueba/{id}',function($id_imagen) {

});





