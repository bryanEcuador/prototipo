<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        return view('modulos.administracion.mantenimiento.Marcas.index');
    }
    public function create(){
        return view('modulos.administracion.mantenimiento.Marcas.create');
    }   //
 public function edit($id)
    {
    	return view('modulos.administracion.mantenimiento.Marcas.create');
    }
}
