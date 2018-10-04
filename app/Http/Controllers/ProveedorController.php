<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProveedorController extends Controller
{
    public function index(){
        return view('modulos.proveedor.index');
    }
    public function create(){
        return view('modulos.proveedor.create');
    }

    public function store(Request $request){

        //$archivos = count($request->file());
        //$file = $request->file("img");
        //dd($file);
        //$name = $file->getClientOriginalName();
        //$file->move(public_path(),$name);
        //while ($archivos >= 0) {
          //  echo $request->file('name')
        //}
        //echo $request->file("img1"[0].originalName);
         Storage::disk('public')->put('\imagenes', $request->file("img"));
         //$patch = Storage::disk('public')->put('imagenes',$request->file("img"));
         //echo $patch;
        dd($request->file('img')->getClientOriginalName());
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
