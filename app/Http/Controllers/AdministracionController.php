<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class AdministracionController extends Controller
{
    //
    public function index(){
        return view('modulos.administracion.index');
    }
    public function create(){
        return view('modulos.administracion.create');
    }
public function politica(){
        return view('modulos.administracion.politica');
    }
    
    public function store(Request $request){
       // dd($request);
        /*
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
        'Empresa.required' => 'La empresa del proveedor es requerido',
        'Ruc.required' => 'El Ruc del proveedor es requerido',
        'Razon.required' => 'La Razon social del proveedor es requerido',
        'Representante.required' => 'El Representante del proveedor es requerido',
        'Direccion.required' => 'La Direccion del proveedor es requerido',
        'Banco.required' => 'El Banco del proveedor es requerido',
        'Cuenta Bancaria.required' => 'La cuenta Bancaria es requerido',
        'Estado.required' => 'El Estado del proveedor es requerido',
        'Gerente.required' => 'El Gerente del proveedor es requerido',
        'Convencional.required' => 'El Convencional del proveedor es requerido',
        'F_Representante.required' => 'El Fono representante del proveedor es requerido',
        'FonoG.required' => 'El Fono gerente del proveedor es requerido',
        'Usuario.required' => 'El usuario del proveedor es requerido',
        'Contraseña.required' => 'La contraseña del proveedor es requerido',
        ]);
           */
        try {
            $numero = 4%0;
            return response()->json(['success'=>'Informacion guardada con exito']);
        } catch (QueryException $e){
            $array = array("Error" , $e->message(responseText));
            return $array;
        }
 
    }

    public function  datosPagina() {
        return view('modulos.administracion.datos');
    }

    public function storeDatosBasicos(Request $request) {
        //echo $request->input('ordenes');
        //dd($request);
         \DB::table('tb_datos_basicos')->insert([
            [
                'nombre' => $request->input('nombre') ,
                'email' => $request->input('email') ,
                'telefono' => $request->input('Telefono') ,
                'direccion' => $request->input('direccion') ,
                'descripcion' => $request->input('descripcion') ,
                'terminos' => $request->input('terminos') ,
                'politica' => $request->input('politicas') ,
                //'acerca' => $request->input('acerca') ,
                'ordenes' => $request->input('ordenes') ,
                //'logo' => 'logo.png'

            ],
        ]);

        //echo $datos;
    }

    public function  showDatosBasicos() {
        $datos = \DB::table('tb_datos_basicos')->distinct()->get()->toArray();
        //echo $datos[0]->nombre;
        //$datos = (array) $datos;
       //echo $datos[0]->id;
        //dd($datos);
        return view('modulos.administracion.datos.show',compact('datos'));
    }
}
