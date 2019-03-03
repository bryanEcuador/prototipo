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


route::get('/store', function(){
        return view ('estaticas.store');
});

route::get('/product', function(){ 
         return view('estaticas.product');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'Auth\RegisterController@index')->name('index');

// prueba , link para realizar prueba de las distintas vistas

/* pruebas */
route::get('cliente/create', 'clienteController@create')->name('clientes.create');
/* /preubas */


         route::get('ventas/index', 'VentaController@index')->name('ventas.index');
         route::get('ventas/consultar/{id}','VentaController@consultarProductos');
        route::post('ventas/guardar','VentaController@guardar');
        route::get('admin/vista','adminController@index');


        // rutas nuevas 


// clientes
route::get('cliente/index', 'clienteController@index')->name('clientes.index');
route::get( 'cliente/consult/{id}','clienteController@consult');
route::get('cliente/search/{paginacion?}/{pagina?}', 'clienteController@search');
route::post('cliente/delete', 'clienteController@destroy');
route::post('cliente/store', 'clienteController@store')->name('cliente.store');
route::post('cliente/update', 'clienteController@update');
    
// Comercio
route::get('comercio/index', 'ComercioController@index')->name('comercio.index');
route::get( 'comercio/search/{paginacion?}/{pagina?}/{consulta?}', 'ComercioController@search');
route::post('comercio/delete', 'ComercioController@delete');
route::post('comercio/store', 'ComercioController@store');
route::post('comercio/update', 'ComercioController@update');
route::get('comercio/consult', 'ComercioController@consult');

// producto TODO
route::get('producto/index', 'ProductoController@index')->name('producto.index');
route::get( 'producto/search/{paginacion?}/{pagina?}/{consulta?}', 'ProductoController@search');
route::post('producto/delete', 'ProductoController@delete');
route::post('producto/consult', 'ProductoController@consult');
route::post('producto/store', 'ProductoController@store');
route::post('producto/update', 'ProductoController@update');

// subscripcion TODO

route::get('comercio/subscripcion/index', 'comercioSubscripcionController@index')->name('subscripcion.index');
route::get('comercio/subscripcion/edit', 'comercioSubscripcionController@edit');
route::get('comercio/subscripcion/create', 'comercioSubscripcionController@create');
route::get('comercio/subscripcion/search', 'comercioSubscripcionController@search');
route::post('comercio/subscripcion/delete', 'comercioSubscripcionController@delete');
route::post('comercio/subscripcion/store', 'comercioSubscripcionController@store');
route::post('comercio/subscripcion/update', 'comercioSubscripcionController@update');
route::get('comercio/subscripcion/show', 'comercioSubscripcionController@show');


// piso 
route::get('comercio/piso/index', 'comercioPisoController@index')->name('piso.index');
route::get('comercio/piso/edit', 'comercioPisoController@edit')->name('piso.edit');
route::get('comercio/piso/create', 'comercioPisoController@create')->name('piso.create');
route::get('comercio/piso/search', 'comercioPisoController@search');
route::post('comercio/piso/delete', 'comercioPisoController@delete');
route::post('comercio/piso/store', 'comercioPisoController@store');
route::post('comercio/piso/update', 'comercioPisoController@update');
route::get('comercio/piso/show', 'comercioPisoController@show')->name('piso.show');

//propaganda
route::get('comercio/piso/propaganda/index', 'comercioPisoPropagandaController@index')->name('propaganda.index');
route::get('comercio/piso/propaganda/edit', 'comercioPisoPropagandaController@edit')->name('propaganda.edit');
route::get('comercio/piso/propaganda/create', 'comercioPisoPropagandaController@create')->name('propaganda.create');
route::get('comercio/piso/propaganda/search', 'comercioPisoPropagandaController@search');
route::get('comercio/piso/propaganda/show', 'comercioPisoPropagandaController@show')->name('propaganda.show');
route::post('comercio/piso/propaganda/delete', 'comercioPisoPropagandaController@delete');
route::post('comercio/piso/propaganda/store', 'comercioPisoPropagandaController@store');
route::post('comercio/piso/propaganda/update', 'comercioPisoPropagandaController@update');


//catalogo cabecera 

route::get('catalogo/cabecera/index', 'CatalogoCabeceraController@index')->name('catalogoCabecera.index');
route::get('catalogo/cabecera/edit', 'CatalogoCabeceraController@edit');
route::get('catalogo/cabecera/create', 'CatalogoCabeceraController@create');
route::get('catalogo/cabecera/search', 'CatalogoCabeceraController@search');
route::get('catalogo/cabecera/show', 'CatalogoCabeceraController@show');
route::post('catalogo/cabecera/delete', 'CatalogoCabeceraController@delete');
route::post('catalogo/cabecera/store', 'CatalogoCabeceraController@store');
route::post('catalogo/cabecera/update', 'CatalogoCabeceraController@update');

//catalogo detalle

route::get('catalogo/detalle/index', 'CatalogoDetalleController@index')->name('catalogoDetalle.index');
route::get('catalogo/detalle/edit', 'CatalogoDetalleController@edit');
route::get('catalogo/detalle/create', 'CatalogoDetalleController@create');
route::get('catalogo/detalle/search', 'CatalogoDetalleController@search');
route::get('catalogo/detalle/show', 'CatalogoDetalleController@show');
route::post('catalogo/detalle/delete', 'CatalogoDetalleController@delete');
route::post('catalogo/detalle/store', 'CatalogoDetalleController@store');
route::post('catalogo/detalle/update', 'CatalogoDetalleController@update');

//liquidacion comercio

route::get('liquidacion/comercio/index', 'LiquidacionComercioController@index')->name('liquidacion.index');
route::get('liquidacion/comercio/edit', 'LiquidacionComercioController@edit');
route::get('liquidacion/comercio/create', 'LiquidacionComercioController@create');
route::get('liquidacion/comercio/search', 'LiquidacionComercioController@search');
route::get('liquidacion/comercio/show', 'LiquidacionComercioController@show');
route::post('liquidacion/comercio/delete', 'LiquidacionComercioController@delete');
route::post('liquidacion/comercio/store', 'LiquidacionComercioController@store');
route::post('liquidacion/comercio/update', 'LiquidacionComercioController@update');


// transacción banco

route::get('transaccion/banco/index', 'TransaccionBancoController@index')->name('transaccion.index');
route::get('transaccion/banco/edit', 'TransaccionBancoController@edit');
route::get('transaccion/banco/create', 'TransaccionBancoController@create');
route::get('transaccion/banco/search', 'TransaccionBancoController@search');
route::get('transaccion/banco/show', 'TransaccionBancoController@show');
route::post('transaccion/banco/delete', 'TransaccionBancoController@delete');
route::post('transaccion/banco/store', 'TransaccionBancoController@store');
route::post('transaccion/banco/update', 'TransaccionBancoController@update');


route::get('fecha/index','FechaController@index')->name('fecha.index');
route::post('fecha/delete', 'FechaController@delete');
route::post('fecha/store', 'FechaController@store');
route::post('fecha/update', 'FechaController@update');

route::get('feriados/index', 'FeriadoController@index')->name('feriado.index');
route::post('feriados/delete', 'FeriadoController@delete');
route::post('feriados/store', 'FeriadoController@store');
route::post('feriados/update', 'FeriadoController@update');

route::get('logs/index', 'LogsController@index')->name('log.index');
route::post('logs/delete', 'LogsController@delete');
route::post('logs/store', 'LogsController@store');
route::post('logs/update', 'LogsController@update');


route::get('usuarios/index', 'UsuariosController@index')->name('usuarios.index');
route::post('usuarios/delete', 'UsuariosController@delete');
route::post('usuarios/store', 'UsuariosController@store');
route::post('usuarios/update', 'UsuariosController@update');

http://localhost:42678/ServiciosVeryApe.svc/ServiciosVeryApe.svc





/* route::get('comercio/producto/index', 'comercioProductoController@index');
route::get('comercio/producto/edit', 'comercioProductoController@edit');
route::get('comercio/producto/create', 'comercioProductoController@create');
route::get('comercio/producto/search', 'comercioProductoController@search');
route::post('comercio/producto/delete', 'comercioProductoController@delete');
route::post('comercio/producto/store', 'comercioProductoController@store');
route::post('comercio/producto/update', 'comercioProductoController@update'); */











