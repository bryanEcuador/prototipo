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


        // rutas nuevas 
        // comercio
route::get('comercio/index', 'comercio@index');
route::get('comercio/edit', 'comercio@edit');
route::get('comercio/create', 'comercio@create');
route::get('comercio/search', 'comercio@search');
route::post('comercio/delete', 'comercio@delete');
route::post('comercio/store', 'comercio@store');
route::post('comercio/update', 'comercio@update');


route::get('cliente/index', 'cliente@index');
route::get('cliente/edit', 'cliente@index');
route::get('cliente/create', 'cliente@index');
route::get('cliente/search', 'cliente@index');
route::post('cliente/delete', 'clienteo@index');
route::post('cliente/store', 'cliente@index');
route::post('cliente/update', 'cliente@index');


route::get('producto/index', 'producto@index');
route::get('producto/edit', 'producto@edit');
route::get('producto/create', 'producto@create');
route::get('producto/search', 'producto@search');
route::post('producto/delete', 'productoo@delete');
route::post('producto/store', 'producto@store');
route::post('producto/update', 'producto@update');










