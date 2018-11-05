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
require __DIR__ . '/modulos/seguridad.php';
Route::get('/', function () {

    //$datos = \DB::table('tbdatosdecontacto')->get();
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'Auth\RegisterController@index')->name('index');

// prueba , link para realizar prueba de las distintas vistas


Route::get('/tienda', function () {
    return view('modulos.usuario.store');
});

route::get('/prueba',function() {
    $datos = DB::table('tb_producto')
        ->where('id_marca','=', [gi2])->get();
    dd($datos);
});







