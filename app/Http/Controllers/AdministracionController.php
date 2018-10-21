<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AdministracionController extends Controller
{
    //
    public function index(){
        $datos = DB::table('tb_proveedores')->get();
     return view('modulos.administracion.index',compact('datos'));
    }
    public function create(){
        return view('modulos.administracion.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'codigo' => 'required|max:25|string',
            'empresa' => 'required|max:10|string',
            'ruc' => 'required |min:0|numeric',
            'razon_social' => 'required|string',
            'representante' => 'required|string',
            'direccion' => 'required|string',
            'banco' => 'required|string',
            'cuenta_bancaria' => 'required |min:0|numeric',
            'estado' => 'required|string',
            'gerente' => 'required|max:25|string',
            'telefono_convencional' => 'required|min:7|numeric',
            'telefono_representante' => 'required|min:7|numeric',
            'telefono_gerente' => 'required|min:7|numeric',
            'usuario' => 'required|max:25|string',
            'pass' => 'required|max:25|string',
        ], ['codigo.required' => 'El codigo del proveedor es requerido',
            'empresa.required' => 'La empresa es requerida',
            'ruc.required' => 'El Ruc del proveedor es requerido',
            'razon_social.required' => 'La Razon social  es requerida',
            'representante.required' => 'El Representante del proveedor es requerido',
            'direccion.required' => 'La Direccion del proveedor es requerido',
            'banco.required' => 'El Banco del proveedor es requerido',
            'cuenta_bancaria.required' => 'La cuenta Bancaria es requerido',
            'estado.required' => 'El Estado del proveedor es requerido',
            'gerente.required' => 'El Gerente es requerido',
            'telefono_convencional.required' => 'El telefono convencional es requerido',
            'telefono_representante.required' => 'El telefono del representante es requerido',
            'telefono_gerente.required' => 'El telefono del gerente es requerido',
            'usuario.required' => 'El usuario del proveedor es requerido',
            'pass.required' => 'La contraseña del proveedor es requerido',
        ]);

        try {

            DB::table('tb_proveedores')->insert([
                "codigo_externo" => $request->input('codigo'),
                "tipo_empresa" => $request->input('empresa'),
                "ruc" => $request->input('ruc'),
                "razon_social" => $request->input('razon_social'),
                "representante_legal" => $request->input('representante'),
                "direccion" => $request->input('direccion'),
                "banco" => "1",//$request->input('banco'),
                "cuenta_bancaria" => $request->input('cuenta_bancaria'),
                "estado" => $request->input('estado'),
                "gerente_general" => $request->input('gerente'),
                "telefono_representante" => $request->input('telefono_representante'),
                "telefono_gerente" => $request->input('telefono_gerente'),
                "usuario" => $request->input('usuario'),
                "contraseña" => bcrypt($request->input('pass')),
            ]);

        } catch (QueryException $e) {
            $array = array("Error", $e->getMessage());
            return $array;
        }

    }

    public function editProveedor($id){
        $id = (integer) $id;
        $datos = DB::table('tb_proveedores')->where('id',$id)->get();
        return view('modulos.administracion.proveedores.edit',compact('datos'));
    }

    public function showProveedor($id){
        $id = (integer) $id;
        $datos = DB::table('tb_proveedores')->where('id',$id)->get();
        return view('modulos.administracion.proveedores.show',compact('datos'));
    }

    public function updateProveedor(Request $request){


        $request->validate([
            'codigo' => 'required|max:25|string',
            'empresa' => 'required|max:10|string',
            'ruc' => 'required |min:0|numeric',
            'razon_social' => 'required|string',
            'representante' => 'required|string',
            'direccion' => 'required|string',
            'banco' => 'required|string',
            'cuenta_bancaria' => 'required |min:0|numeric',
            'estado' => 'required|string',
            'gerente' => 'required|max:25|string',

            'telefono_representante' => 'required|min:7|numeric',
            'telefono_gerente' => 'required|min:7|numeric',
            'usuario' => 'required|max:25|string',

        ], ['codigo.required' => 'El codigo del proveedor es requerido',
            'empresa.required' => 'La empresa es requerida',
            'ruc.required' => 'El Ruc del proveedor es requerido',
            'razon_social.required' => 'La Razon social  es requerida',
            'representante.required' => 'El Representante del proveedor es requerido',
            'direccion.required' => 'La Direccion del proveedor es requerido',
            'banco.required' => 'El Banco del proveedor es requerido',
            'cuenta_bancaria.required' => 'La cuenta Bancaria es requerido',
            'estado.required' => 'El Estado del proveedor es requerido',
            'gerente.required' => 'El Gerente es requerido',

            'telefono_representante.required' => 'El telefono del representante es requerido',
            'telefono_gerente.required' => 'El telefono del gerente es requerido',
            'usuario.required' => 'El usuario del proveedor es requerido',

        ]);

        try {
            if($request->input('pass') == null ) {
                \DB::table('tb_proveedores')->where('id',$request->input('id'))->update([
                    "codigo_externo" => $request->input('codigo'),
                    "tipo_empresa" => $request->input('empresa'),
                    "ruc" => $request->input('ruc'),
                    "razon_social" => $request->input('razon_social'),
                    "representante_legal" => $request->input('representante'),
                    "direccion" => $request->input('direccion'),
                    "banco" => "1",//$request->input('banco'),
                    "cuenta_bancaria" => $request->input('cuenta_bancaria'),
                    "estado" => $request->input('estado'),
                    "gerente_general" => $request->input('gerente'),
                    "telefono_representante" => $request->input('telefono_representante'),
                    "telefono_gerente" => $request->input('telefono_gerente'),
                    "usuario" => $request->input('usuario'),
                ]);
            } else {
                \DB::table('tb_proveedores')->where('id',$request->input('id'))->update([
                    "codigo_externo" => $request->input('codigo'),
                    "tipo_empresa" => $request->input('empresa'),
                    "ruc" => $request->input('ruc'),
                    "razon_social" => $request->input('razon_social'),
                    "representante_legal" => $request->input('representante'),
                    "direccion" => $request->input('direccion'),
                    "banco" => $request->input('banco'),
                    "cuenta_bancaria" => $request->input('cuenta_bancaria'),
                    "estado" => $request->input('estado'),
                    "gerente_general" => $request->input('gerente'),
                    "telefono_representante" => $request->input('telefono_representante'),
                    "telefono_gerente" => $request->input('telefono_gerente'),
                    "usuario" => $request->input('usuario'),
                    "contraseña" => bcrypt($request->input('pass')),
                ]);
            }

    
        } catch (QueryException $e) {
            $array = array("Error", $e->getMessage());
            return $array;
        }

    }

    public function delteProveedor($id){

    }




    public function politica(){
        return view('modulos.administracion.politica');
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
