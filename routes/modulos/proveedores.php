<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'proveedor' , 'as' => 'proveedor.' ], function() {
    route::get('/index','ProveedorController@index')->name('index');
    route::get('/create','ProveedorController@create')->name('create');
    route::post('/guardar','ProveedorController@store')->name('store');
    route::get('/ver/{id}','ProveedorController@show')->name('show');
    route::post('/actualizar/{id}','ProveedorController@store')->name('update');
    route::get('/editar/{id}','ProveedorController@edit')->name('edit');
    route::get('/eliminar/{id}','ProveedorController@edit')->name('destroy');

    route::get('/marca','ProveedorController@consultarMarcas')->name('marca');
    route::get('/categoria','ProveedorController@consultarCategorias')->name('categoria');
    route::get('/sub-categoria','ProveedorController@consultarSubCategorias')->name('subcategoria');
    route::get('/colores','ProveedorController@consultarColores')->name('colores');
});

//});
