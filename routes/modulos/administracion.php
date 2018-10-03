<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index','AdministracionController@index')->name('administracion.index');
    route::get('/create','AdministracionController@create')->name('administracion.create');
    route::get('/guardar','AdministracionController@store')->name('administracion.store');
});

//});