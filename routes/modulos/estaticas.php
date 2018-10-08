<?php
Route::get('/terminos-condiciones', function () {
    return view('estaticas.terminos');
})->name('terminos');

Route::get('/politicas-privacidad', function () {
    return view('estaticas.politicas');
})->name('politicas');

Route::get('/acerca-de', function () {
    return view('estaticas.acerca');
})->name('acerca');