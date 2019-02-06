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
        // Comercio
route::get('comercio/index', 'ComercioController@index');
route::get('comercio/edit', 'ComercioController@edit');
route::get('comercio/create', 'ComercioController@create');
route::get('comercio/search', 'ComercioController@search');
route::post('comercio/delete', 'ComercioController@delete');
route::post('comercio/store', 'ComercioController@store');
route::post('comercio/update', 'ComercioController@update');
route::get('comercio/show', 'ComercioController@show');

route::get('cliente/index', 'clienteController@index');
route::get('cliente/edit', 'clienteController@edit');
route::get('cliente/create', 'clienteController@create');
route::get('cliente/search', 'clienteController@search');
route::post('cliente/delete', 'clienteController@delete');
route::post('cliente/store', 'clienteController@store');
route::post('cliente/update', 'clienteController@update');
route::get('cliente/show', 'ComercioController@show');

route::get('comercio/piso/index', 'comercioPisoController@index');
route::get('comercio/piso/edit', 'comercioPisoController@edit');
route::get('comercio/piso/create', 'comercioPisoController@create');
route::get('comercio/piso/search', 'comercioPisoController@search');
route::post('comercio/piso/delete', 'comercioPisoController@delete');
route::post('comercio/piso/store', 'comercioPisoController@store');
route::post('comercio/piso/update', 'comercioPisoController@update');
route::get('comercio/piso/show', 'comercioPisoController@show');

route::get('comercio/piso/propaganda/index', 'comercioPisoPropagandaControllerController@index');
route::get('comercio/piso/propaganda/edit', 'comercioPisoPropagandaControllerController@edit');
route::get('comercio/piso/propaganda/create', 'comercioPisoPropagandaControllerController@create');
route::get('comercio/piso/propaganda/search', 'comercioPisoPropagandaControllerController@search');
route::post('comercio/piso/propaganda/delete', 'comercioPisoPropagandaControllerController@delete');
route::post('comercio/piso/propaganda/store', 'comercioPisoPropagandaControllerController@store');
route::post('comercio/piso/propaganda/update', 'comercioPisoPropagandaControllerController@update');
route::post('comercio/piso/propaganda/update', 'comercioPisoPropagandaController@show');


route::get('comercio/subscripcion/index', 'comercioSubscripcionController@index');
route::get('comercio/subscripcion/edit', 'comercioSubscripcionController@edit');
route::get('comercio/subscripcion/create', 'comercioSubscripcionController@create');
route::get('comercio/subscripcion/search', 'comercioSubscripcionController@search');
route::post('comercio/subscripcion/delete', 'comercioSubscripcionController@delete');
route::post('comercio/subscripcion/store', 'comercioSubscripcionController@store');
route::post('comercio/subscripcion/update', 'comercioSubscripcionController@update');
route::get('comercio/subscripcion/show', 'comercioSubscripcionController@show');

route::get('producto/index', 'ProductoController@index');
route::get('producto/edit', 'ProductoController@edit');
route::get('producto/create', 'ProductoController@create');
route::get('producto/search', 'ProductoController@search');
route::post('producto/delete', 'ProductoController@delete');
route::post('producto/store', 'ProductoController@store');
route::post('producto/update', 'ProductoController@update');






route::get('comercio/producto/index', 'comercioProductoControllerController@index');
route::get('comercio/producto/edit', 'comercioProductoControllerController@edit');
route::get('comercio/producto/create', 'comercioProductoControllerController@create');
route::get('comercio/producto/search', 'comercioProductoControllerController@search');
route::post('comercio/producto/delete', 'comercioProductoControllerController@delete');
route::post('comercio/producto/store', 'comercioProductoControllerController@store');
route::post('comercio/producto/update', 'comercioProductoControllerController@update');











