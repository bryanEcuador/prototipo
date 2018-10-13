<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
   public function index(){
        return view('modulos.administracion.mantenimiento.Sub_Categorias.index');
    }
    public function create(){
        return view('modulos.administracion.mantenimiento.Sub_Categorias.create');
    } 
    public function edit($id)
    {
    	return view('modulos.administracion.mantenimiento.Sub_Categorias.create');
    }
}
