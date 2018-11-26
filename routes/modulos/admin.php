<?php
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'administracion' , 'as' => 'administracion.' ], function() {
        route::get('index', 'AdministradorController@index')->name('index');
    });
});