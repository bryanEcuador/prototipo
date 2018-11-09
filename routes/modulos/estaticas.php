<?php
Route::get('/terminos-condiciones', function () {
   $datos = \DB::table('tb_datos_basicos')->distinct()->get();
    return view('estaticas.terminos',compact('datos'));
})->name('terminos');

Route::get('/politicas-privacidad', function () {
    $datos = \DB::table('tb_datos_basicos')->distinct()->get();
    return view('estaticas.politicas',compact('datos'));
})->name('politicas');

Route::get('/acerca-de', function () {
    $datos = \DB::table('tb_datos_basicos')->distinct()->get();
    return view('estaticas.acerca',compact('datos'));
})->name('acerca');

route::get('/info/basica',function() {
    return \DB::table('tb_datos_basicos')->distinct()->get();
});