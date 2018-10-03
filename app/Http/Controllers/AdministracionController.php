<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    //
    public function index(){
        return view('modulos.administracion.index');
    }
    public function create(){
        return view('modulos.administracion.create');
    }

    public function strore(Request $request){
        dd($request);
    }
}
