<?php
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index','AdministracionController@index')->name('administracion.index');
    route::get('/create','AdministracionController@create')->name('administracion.create');
    route::get('/proveedor/editar/{id}','AdministracionController@editProveedor')->name('proveedor.edit');
    route::get('/proveedor/ver/{id}','AdministracionController@showProveedor')->name('proveedor.show');
    route::post('/proveedor/actualizar','AdministracionController@updateProveedor')->name('proveedor.update');
    route::post('/proveedor/eliminar/{id}','AdministracionController@deleteProveedor')->name('proveedor.delete');

    // rutas de marca
    route::get('/marca/index','MarcaController@index')->name('marca.index');
    route::get('/marca/load/{page?}/{nombre?}','MarcaController@loadData')->name('marca.load');
    route::post('/marca/store','MarcaController@store')->name('marcas.store');
    route::put('/marca/update','MarcaController@update')->name('marcas.update');
    route::delete('/marca/delete/{id}','MarcaController@delete')->name('marcas.delete');

    // rutas de subcategoria
    route::get('/subcategoria/index','SubCategoriaController@index')->name('subCategorias.index');
    route::get('/subcategoria/categorias','SubCategoriaController@categorias')->name('subCategorias.categorias');
    route::get('/subcategoria/load/{page?}/{nombre?}','SubcategoriaController@loadData')->name('subcategoria.load');
    route::post('/subcategoria/store','SubcategoriaController@store')->name('subcategorias.store');
    route::put('/subcategoria/update','SubcategoriaController@update')->name('subcategorias.update');
    route::delete('/subcategoria/delete/{id}','SubcategoriaController@delete')->name('subcategorias.delete');

    // rutas de categoria
    route::get('/categoria/index','CategoriaController@index')->name('categorias.index');
    route::get('/categoria/load/{page?}/{nombre?}','CategoriaController@loadData')->name('categoria.load');
    route::post('/categoria/store','CategoriaController@store')->name('categorias.store');
    route::put('/categoria/update','CategoriaController@update')->name('categorias.update');
    route::delete('/categoria/delete/{id}','CategoriaController@delete')->name('categorias.delete');

    route::get('/politica','AdministracionController@politica')->name('administracion.politica');
    route::get('/datos-pagina','AdministracionController@datosPagina')->name('datos');
    route::get('/show/datos-pagina','AdministracionController@showDatosBasicos')->name('datos.show');
    route::post('/guardar/datos-pagina','AdministracionController@storeDatosBasicos')->name('store.datos');


});

