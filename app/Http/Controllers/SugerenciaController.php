<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SugerenciaController extends Controller
{
    public function index(){
        return view('modulos.proveedor.sugerencia');

 }
}
