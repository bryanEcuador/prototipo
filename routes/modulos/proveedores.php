<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'proveedor' , 'as' => 'proveedor.' ], function() {
    route::get('/index','ProveedorController@index')->name('index');
    route::get('/create','ProveedorController@create')->name('create');
    route::post('/guardar','ProveedorController@store')->name('store');
    route::get('/ver','ProveedorController@store')->name('proveedor.show');
    route::post('/actualizar','ProveedorController@store')->name('proveedor.update');
    route::get('/marca','ProveedorController@consultarMarcas')->name('marca');
    route::get('/categoria','ProveedorController@consultarCategorias')->name('categoria');
    route::get('/sub-categoria','ProveedorController@consultarSubCategorias')->name('subcategoria');
    route::get('/colores','ProveedorController@consultarColores')->name('colores');
});

//});
