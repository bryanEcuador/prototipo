<?php
Auth::routes();
Route::group(['prefix' => 'seguridad' , 'as' => 'seguridad.' ], function() {

    // permisos
        Route::get('permisos','PermisosController@index')->name('permisos.index');
        Route::get('permisos/datos/{paginacion}/{page?}/{nombre?}','PermisosController@loadData');
        Route::post('permisos/store','PermisosController@store')->name('permisos.guardar');
        Route::put('permisos/update','PermisosController@update')->name('permisos.update');        
        Route::get('show/permisos/{id}','PermisosController@show')->name('permisos.show')->where('id' , '[0-9]+');
                
    // Roles

    // Usuarios


    
    
});
