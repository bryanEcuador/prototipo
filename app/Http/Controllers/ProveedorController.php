<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        return view('modulos.proveedor.index');
    }
    public function create(){
        return view('modulos.proveedor.create');
    }

    public function strore(Request $request){
        dd($request);
    }
}
