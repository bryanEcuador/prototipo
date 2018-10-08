<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index','AdministracionController@index')->name('administracion.index');
    route::get('/create','AdministracionController@create')->name('administracion.create');
    route::post('/guardar','AdministracionController@store')->name('store');
<<<<<<< HEAD
    route::get('/politica','AdministracionController@politica')->name('administracion.politica');
    
=======
    route::get('/datos-pagina','AdministracionController@datosPagina')->name('datos');
>>>>>>> 21738b039cc97f995238a0745c2508a8249ea730
});

//});