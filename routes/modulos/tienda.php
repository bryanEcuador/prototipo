<?php
// tienda
Route::get('/','TiendaController@inicio')->name('welcome');


route::get('/productos/search/{page?}/{paginacion?}/{categorias?}/{nombre?}','TiendaController@productos')->name('productos');
route::get('/detalles/{id}','TiendaController@detalle')->name('detalle');

route::get('/categorias','TiendaController@categorias')->name('categorias');
route::get('/subcategorias/{categoria?}','TiendaController@subCategorias')->name('subcategoria');
route::get('/marcas','TiendaController@marcas')->name('marca');
route::get('/filtro/{page?}','TiendaController@filtro')->name('filtro');
route::post('/consultar/colores','TiendaController@consultarColores')->name('colores');
route::get('/prueba/controler','TiendaController@categorias');
Route::get('/tienda', function () {
    return view('modulos.usuario.store');
})->name('tienda');
Route::get('/comentarios/producto/{id}/{pagina?}','TiendaController@consultarComentarios');
Route::get('/promedio/producto/{id}','TiendaController@consultarPromedioProductos');
Route::get('/top/productos','TiendaController@consultarProductosTop');
Route::get('/productos/vendidos','TiendaController@consultarProductosTopVentas');
Route::post('/guardar/comentarios','TiendaController@guardarComentarios');
Route::get('/web','TiendaController@webService');
route::get('/validar/sesion','TiendaController@validarSesion');
route::post('/iniciar/sesion','TiendaController@iniciarSesion');
route::get('comprar/{id}','TiendaController@comprar');
