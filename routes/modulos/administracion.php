<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {

    route::get('/index','AdministracionController@index')->name('administracion.index');
    
    route::get('/create','AdministracionController@create')->name('administracion.create');

    route::get('/proveedor/editar/{id}','AdministracionController@editProveedor')->name('proveedor.edit');
    route::get('/proveedor/ver/{id}','AdministracionController@showProveedor')->name('proveedor.show');
    route::post('/proveedor/actualizar','AdministracionController@updateProveedor')->name('proveedor.update');
    route::post('/proveedor/eliminar/{id}','AdministracionController@deleteProveedor')->name('proveedor.delete');




    route::get('/politica','AdministracionController@politica')->name('administracion.politica');
    route::get('/datos-pagina','AdministracionController@datosPagina')->name('datos');
    route::get('/show/datos-pagina','AdministracionController@showDatosBasicos')->name('datos.show');
    route::post('/guardar/datos-pagina','AdministracionController@storeDatosBasicos')->name('store.datos');
    route::get('/categoria/index','CategoriaController@index')->name('administacion.mantenimiento.Categorias.index');
    route::get('/categoria/create','CategoriaController@create')->name('administracion.mantenimiento.Categorias.create');

    route::get('/subcategoria/index','SubCategoriaController@index')->name('administacion.mantenimiento.SubCategorias.index');
    route::get('/subcategoria/create','SubCategoriaController@create')->name('administracion.mantenimiento.Sub_Categorias.create');
    
route::get('/marca/index','MarcaController@index')->name('administacion.mantenimiento.Marcas.index');
    route::get('/marca/create','CategoriaController@create')->name('administracion.mantenimiento.Marcas.create');
});

