<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index','AdministracionController@index')->name('administracion.index');
    route::get('/create','AdministracionController@create')->name('administracion.create');
    route::post('/guardar','AdministracionController@store')->name('store');
    route::get('/politica','AdministracionController@politica')->name('administracion.politica');
    route::get('/datos-pagina','AdministracionController@datosPagina')->name('datos');
    route::get('/show/datos-pagina','AdministracionController@showDatosBasicos')->name('datos.show');
    route::post('/guardar/datos-pagina','AdministracionController@storeDatosBasicos')->name('store.datos');
    route::get('/index','CategoriaController@index')->name('administacion.mantenimiento.Categorias.index');
    route::get('/create','CategoriaController@create')->name('administracion.mantenimiento.Categorias.create');

    route::get('/index','SubCategoriaController@index')->name('administacion.mantenimiento.Sub_Categorias.index');
    route::get('/create','SubCategoriaController@create')->name('administracion.mantenimiento.Sub_Categorias.create');
    
route::get('/index','MarcaController@index')->name('administacion.mantenimiento.Marcas.index');
    route::get('/create','CategoriaController@create')->name('administracion.mantenimiento.Marcas.create');
});

