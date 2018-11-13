<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Core\Procedimientos\ConfiguracionProcedure;
use  App\Http\Controllers\Auth\RegisterController;

class AdministracionController extends Controller
{
    protected  $RegisterController;
    protected $ConfiguracionProcedure;

    public function __construct(ConfiguracionProcedure $configuracionProcedure,RegisterController $loginController)
    {
        $this->ConfiguracionProcedure  = $configuracionProcedure;
        $this->RegisterController= $loginController;
    }

    //
    public function index(){
        $datos = DB::table('tb_proveedores')->get();
     return view('modulos.administracion.proveedores.index',compact('datos'));
    }
    public function create(){
        return view('modulos.administracion.proveedores.create');
    }

    public function storeProveedor(Request $request)
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
            'telefono_representante' => 'required|min:7|numeric',
            'telefono_gerente' => 'required|min:7|numeric',
            'usuario' => 'required|max:25|string',
            'pass' => 'required|max:25|string',
            'email' => 'required|email',
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
            'pass.required' => 'La contraseña del proveedor es requerido',
        ]);

        try {

            $user_id = DB::table('users')->insertGetId([
                'name' => $request->input('usuario'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('pass')),
                'estado' => 1,
            ]);

            $rol = 2;

            DB::table('role_user')->insert([
                'role_id' => $rol,'user_id' => $user_id
            ]);

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
                "user_id" => $user_id,

            ]);

        } catch (QueryException $e) {
            $array = array("Error", $e->getMessage());
            return $array;
        }

    }

    public function editProveedor($id){
        $id = (integer) $id;
        $datos = DB::select('CALL spConsultarProveedor(?)',array($id));
        return view('modulos.administracion.proveedores.edit',compact('datos'));
    }

    public function showProveedor($id){
        $id = (integer) $id;
        $datos = DB::select('CALL spConsultarProveedor(?)',array($id));
        return view('modulos.administracion.proveedores.show',compact('datos'));
    }

    public function updateProveedor(Request $request){

        //dd($request);
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
            'email' => 'required|email',

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
            'usuario.required' => 'El nombre de usuario es requerido',
            'email.required' => 'El email es requerido',
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
                ]);

                DB::table('users')->where('id',$request->input('user_id'))
                ->update([
                    "name" => $request->input('usuario') ,
                    "email" => $request->input('email') ,
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
                ]);

                DB::table('users')->where('id',$request->input('user_id'))
                    ->update([
                        "name" => $request->input('usuario') ,
                        "email" => $request->input('email') ,
                        "password" => bcrypt($request->input('pass')),
                    ]);
            }
            flash()->success('se ha actualizado el proveedor con exito');
            return redirect()->route('administrador.proveedor.index');
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

        $request->validate(
            [
                'nombre' => 'required|max:15|min:3|string',
                'email' => 'required|min:10|max:50|E-Mail',
                'telefono' => 'required|min:6|max:10|string',
                'direccion' => 'required|max:25|min:7|string',
                'terminos' => 'required|min:10|string',
                'politicas' => 'required|min:10|string',
                'ordenes' => 'required|min:10|string',
                'acerca' => 'required|min:10|string',
            ], [
                'nombre.required' => 'El campo nombre es requerido',
                'email.required' => 'El campo email es requerido',
                'telefono.required' => 'El campo telefono es requerido',
                'direccion.required' => 'El campo dirección es requerido',
                'terminos.required' => 'El campo terminos es requerido',
                'politicas.required' => 'El campo politicas es requerido',
                'ordenes.required' => 'El campo ordenes es requerido',
                'acerca.required' => 'El campo acerca es requerido',

                'nombre.max' => 'El campo nombre no puede tener más de 15 caracteres',
                'email.max' => 'El campo email no puede tener más de 50 caracteres',
                'telefono.max' => 'El campo telefono no puede tener más de 10 caracteres',
                'direccion.max' => 'El campo dirección no puede tener más de 25 caracteres',

                'nombre.min' => 'El campo nombre no puede tener menos de 3 caracteres',
                'email.min' => 'El campo email no puede tener menos de 10 caracteres',
                'telefono.min' => 'El campo telefono no puede tener menos de 6 caracteres',
                'direccion.min' => 'El campo dirección no puede tener menos de 7 caracteres',
                'terminos.min' => 'El campo terminos no puede tener menos de 10 caracteres',
                'politicas.min' => 'El campo politicas no puede tener menos de 10 caracteres',
                'ordenes.min' => 'El campo ordenes no puede tener menos de 10 caracteres',
                'acerca.min' => 'El campo acerca no puede tener menos de 10 caracteres',

                'nombre.string' => 'El campo nombre debe de ser de tipo texto',
                'email.string' => 'El campo email debe de ser de tipo email',
                'telefono.string' => 'El campo telefono debe de ser de tipo texto',
                'direccion.string' => 'El campo dirección debe de ser de tipo texto',
                'terminos.string' => 'El campo terminos debe de ser de tipo texto',
                'politicas.string' => 'El campo politicas debe de ser de tipo texto',
                'ordenes.string' => 'El campo ordenes debe de ser de tipo texto',
                'acerca.string' => 'El campo acerca debe de ser de tipo texto',

            ]
        );
        DB::table('tb_datos_basicos')
            ->where('id',1)
            ->update([

                'nombre' => $request->input('nombre') ,
                'email' => $request->input('email') ,
                'telefono' => $request->input('telefono') ,
                'direccion' => $request->input('direccion') ,
                'descripcion' => $request->input('descripcion') ,
                'terminos' => $request->input('terminos') ,
                'politica' => $request->input('politicas') ,
                'acerca' => $request->input('acerca') ,
                'ordenes' => $request->input('ordenes') ,
                //'logo' => 'logo.png'


        ]);
        try{
            $this->ConfiguracionProcedure->guadarDatosPagina($request->input('nombre') ,$request->input('email') ,$request->input('telefono') ,
                $request->input('direccion') ,$request->input('descripcion') ,$request->input('terminos') ,$request->input('politicas') ,
                $request->input('acerca') ,$request->input('ordenes') );
            return redirect()->back()->withSuccess('Registro actualizado con exito !');
        }catch (QueryException $exception){
            dd($exception);
            return redirect()->back()->with('danger', "Error".$exception->errorInfo[1]);
        }


        //echo $datos;
    }
    public function  showDatosBasicos() {
        $datos = \DB::table('tb_datos_basicos')->distinct()->get()->toArray();
        return view('modulos.administracion.datos.show',compact('datos'));
    }
    public function consultarDatos() {
        return DB::table('tb_datos_basicos')->distinct()->get();
    }

    public function producto(){
        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')->get();
        return view('modulos.administracion.productos.index',compact('datos'));

    }

     public function  show($id) {

        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        //dd($imagenes);
        return view('modulos.administracion.productos.show',compact('datos','imagenes'));
    }

    public function  edit($id) {

        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('id','producto_id','color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        return view('modulos.administracion.productos.edit',compact('datos','imagenes'));
    }


}
