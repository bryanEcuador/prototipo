<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index','AdministracionController@index')->name('administracion.index');
    route::get('/create','AdministracionController@create')->name('administracion.create');
    route::post('/guardar','AdministracionController@store')->name('store');

    // datos de la pagina
    route::get('/datos-pagina','AdministracionController@datosPagina')->name('datos');
    route::get('/show/datos-pagina','AdministracionController@showDatosBasicos')->name('datos.show');
    route::post('/guardar/datos-pagina','AdministracionController@storeDatosBasicos')->name('store.datos');


});

//});