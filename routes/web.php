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
require __DIR__ . '/modulos/tienda.php';


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'Auth\RegisterController@index')->name('index');

// prueba , link para realizar prueba de las distintas vistas




         route::get('ventas/index', 'VentaController@index')->name('ventas.index');
         route::get('ventas/consultar/{id}','VentaController@consultarProductos');
        route::post('ventas/guardar','VentaController@guardar');
        route::get('admin/vista','adminController@index');









