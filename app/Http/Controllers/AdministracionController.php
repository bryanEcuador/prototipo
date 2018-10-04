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
        $request->validate([
            'codigo' => 'required|max:25|string',
            'Empresa' => 'required|max:10|string',
            'Ruc'=>'required |min:0|numeric',
            'Razon'=> 'required|string',
            'Representante'=> 'required|string',
            'Direccion'=> 'required|string',
            'Banco' => 'required|max:50|min:15|string',
            'Cuenta Bancaria'=>'required |min:0|numeric',
            'Estado'=> 'required|string',
            'Gerente' => 'required|max:25|string',
            'Convencional' => 'required|min:0|numeric',
            'F_Representante' => 'required|max:100|min:0|numeric',
            'FonoG' => 'required|max:30|min:0|numeric',
            'Usuario' => 'required|max:25|string',
            'Contraseña' => 'required|max:25|string',
        ],['codigo.required' => 'El codigo del proveedor es requerido',
        'Empresa.required' => 'La Empresa del proveedor es requerido',
        'Ruc.required' => 'El Ruc del proveedor es requerido',
        'Razon.required' => 'La Razon social del proveedor es requerido',
        'Representante.required' => 'El Representante del proveedor es requerido',
        'Direccion.required' => 'La Direccion del proveedor es requerido',
        'Banco.required' => 'El Banco del proveedor es requerido',
        'Cuenta Bancaria.required' => 'La cuenta Bancaria es requerido',
        'Estado' => 'El Estado del proveedor es requerido',
        'Gerente' => 'El Gerente del proveedor es requerido',
        'Convencional' => 'El Convencional del proveedor es requerido',
        'F_Representante' => 'El F_Representante del proveedor es requerido',
        'FonoG' => 'El FonoG del proveedor es requerido',
        'Usuario' => 'El Usuario del proveedor es requerido',
        'Contraseña' => 'La Contraseña del proveedor es requerido',
        ]);
 
    }
}
