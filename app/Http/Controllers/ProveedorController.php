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

    public function store(Request $request){

        echo count($request->file());
        echo count($request->file("img1"));
        dd($request->file());
        $request->validate([
            'nombre' => 'required|max:25|string',
            'codigo' => 'required|max:10|string',
            'categoria'=> 'required|string',
            'sub_categoria'=> 'required|string',
            'marca'=> 'required|string',
            'descripcion' => 'required|max:50|min:15|string',
            'precio' => 'required|min:0|numeric',
            'iva' => 'required|max:100|min:0|numeric',
            'colores' => 'required',
        ],['nombre.required' => 'El nombre del producto es requerido',
        ]);
    }
}
