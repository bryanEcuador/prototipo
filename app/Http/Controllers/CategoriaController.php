<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        return view('modulos.administracion.mantenimiento.Categorias.index');
    }
    public function create(){
        return view('modulos.administracion.mantenimiento.Categorias.create');
    } //
 public function edit($id)
    {
    	return view('modulos.administracion.mantenimiento.Categorias.create');
    }
}
