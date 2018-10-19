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

route::get('/prueba',function() {
    $id = 10;
    $producto =\DB::table('tb_producto')->where('id',$id)->get();
    //dd($producto);
    $imagenes =\DB::table('tb_imagenes')->where('producto_id',$id)->get();
    return view('prueba',compact('producto','imagenes'));
});

route::get('/productos','TiendaController@productos')->name('productos');
route::get('/detalles/{id}','TiendaController@detalle')->name('detalle');





