<?php
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'ventas' , 'as' => 'ventas.' ], function() {
        route::get('index', 'ventasContollerr@index')->name('index');
        route::get('consultar/{id}','VentasController@consultarProductos');
    });
});