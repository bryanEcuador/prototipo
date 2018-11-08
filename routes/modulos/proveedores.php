<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'proveedor' , 'as' => 'proveedor.' ], function() {
    route::get('/',function() {
        return view('modulos.proveedor.principal');
    })->name('principal');
    route::get('/configuracion',function() {
        return view('modulos.proveedor.configuracion');
    })->name('configuracion');

    route::get('/index','ProveedorController@index')->name('index');
    route::get('/create','ProveedorController@create')->name('create');
    route::post('/guardar','ProveedorController@store')->name('store');
    route::get('/ver/{id}','ProveedorController@show')->name('show');
    route::post('/actualizar','ProveedorController@update')->name('update');
    route::get('/editar/{id}','ProveedorController@edit')->name('edit');
    route::get('/delete/{id}','ProveedorController@delete')->name('destroy');

    route::get('/consultar/imagenes/{id}','ProveedorController@consultarImagenes')->name('consultar.imagenes');
    route::post('/eliminar/imagen','ProveedorController@eliminarImagen')->name('eliminar.imagenes');
    route::get('/validar/eliminar/imagen/{id}','ProveedorController@validarEliminacionImagenes')->name('validar.eliminar.imagenes');
    route::post('/agregar/imagen','ProveedorController@agregarImagen')->name('agregar.imagenes');

    route::get('/marca','ProveedorController@consultarMarcas')->name('marca');
    route::get('/categoria','ProveedorController@consultarCategorias')->name('categoria');
    route::get('/sub-categoria','ProveedorController@consultarSubCategorias')->name('subcategoria');
    route::get('/colores','ProveedorController@consultarColores')->name('colores');
});

//});
