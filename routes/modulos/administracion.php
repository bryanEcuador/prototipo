<?php

use Illuminate\Support\Facades\View;
//Route::middleware(['auth'])->group(function () {

Route::group(['prefix' => 'administrador' , 'as' => 'administrador.' ], function() {
    route::get('/index',function (){
        return view('modulos.administracion.index');
    })->name('index');


    route::get('/proveedor/index','AdministracionController@index')->name('proveedor.index');
    route::get('/proveedor/create','AdministracionController@create')->name('proveedor.create');
    route::get('/proveedor/editar/{id}','AdministracionController@editProveedor')->name('proveedor.edit');
    route::get('/proveedor/ver/{id}','AdministracionController@showProveedor')->name('proveedor.show');
    route::post('/proveedor/actualizar','AdministracionController@updateProveedor')->name('proveedor.update');
    route::post('/proveedor/guardar','AdministracionController@storeProveedor')->name('proveedor.store');
    route::post('/proveedor/eliminar/{id}','AdministracionController@deleteProveedor')->name('proveedor.delete');

    // rutas de marca
    route::get('/marca/index','MarcaController@index')->name('marca.index');
    route::get('/marca/load/{paginacion}/{page?}/{nombre?}','MarcaController@loadData')->name('marca.load');
    route::post('/marca/store','MarcaController@store')->name('marcas.store');
    route::put('/marca/update','MarcaController@update')->name('marcas.update');
    route::delete('/marca/delete/{id}','MarcaController@delete')->name('marcas.delete');

    // rutas de subcategoria
    route::get('/subcategoria/index','SubCategoriaController@index')->name('subCategorias.index');
    route::get('/subcategoria/categorias','SubCategoriaController@categorias')->name('subCategorias.categorias');
    route::get('/subcategoria/load/{paginacion}/{page?}/{nombre?}','SubcategoriaController@loadData')->name('subcategoria.load');
    route::post('/subcategoria/store','SubcategoriaController@store')->name('subcategorias.store');
    route::put('/subcategoria/update','SubcategoriaController@update')->name('subcategorias.update');
    route::delete('/subcategoria/delete/{id}','SubcategoriaController@delete')->name('subcategorias.delete');

    // rutas de categoria
    route::get('/categoria/index','CategoriaController@index')->name('categorias.index');
    route::get('/categoria/load/{paginacion}/{page?}/{nombre?}','CategoriaController@loadData')->name('categoria.load');
    route::post('/categoria/store','CategoriaController@store')->name('categorias.store');
    route::put('/categoria/update','CategoriaController@update')->name('categorias.update');
    route::delete('/categoria/delete/{id}','CategoriaController@delete')->name('categorias.delete');

    // rutas de configuración
    route::get('/politica','AdministracionController@politica')->name('politica');
    route::get('/show/datos-pagina','AdministracionController@showDatosBasicos')->name('datos.show');
    route::get('/consultar/datos-pagina','AdministracionController@consultarDatos')->name('datos.consultar');
    route::post('/guardar/datos-pagina','AdministracionController@storeDatosBasicos')->name('store.datos');
    
    //rutas de productos
    route::get('/producto/index','AdministracionController@producto')->name('producto.index');
    route::get('producto/ver/{id}','AdministracionController@show')->name('producto.show');
    route::get('producto/editar/{id}','AdministracionController@edit')->name('producto.edit');


        //Rutas de Sugerencias 
    Route::get('/sugerencias','SugerenciaController@managerView')->name('Sugerencias.index');
    route::get('/consultar/sugerencias/{id}','SugerenciaController@suggestionList');
    route::post('/guardar/sugerencias','SugerenciaController@storeSuggestion');
    route::post('/eliminar/sugerencias','SugerenciaController@deleteSuggestion');

    // rutas de colores
    route::get('/colores/index','ColorController@index')->name('colores.index');
    route::get('/colores/edit','ColorController@edit')->name('colores.edit');
    route::put('/colores/update/{id}','ColorController@update')->name('colores.update');
    route::post('/colores/store','ColorController@store')->name('colores.store');
    route::get('/colores/load/{paginacion}/{page?}/{nombre?}','ColorController@loadData')->name('color.load');

    route::get('/formulario', function () {
        return View('formulario');
    });

    route::post('xml', 'AdministracionController@xml')->name('xml');


});

