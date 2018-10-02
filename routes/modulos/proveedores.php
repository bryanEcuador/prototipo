<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'proveedor' , 'as' => 'proveedor.' ], function() {
    route::get('/index','ProveedorController@index')->name('proveedor.index');
    route::get('/create','ProveedorController@create')->name('proveedor.create');
    route::get('/guardar','ProveedorController@store')->name('proveedor.store');
});

//});
