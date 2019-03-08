<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\ProveedorController;
use App\Core\Procedimientos\TiendaProcedure;
use App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;


class TiendaController extends Controller {

    protected $ProveedorController;
    protected $TiendaProcedure;
    protected $LoginController;
    public  $categorias;
    public  $subcategorias;
    public  $marca;

    protected $xml;
    protected $paginacion;
    protected $metodo;


    public function __construct(XmlController $xml , PaginacionController $paginacion) {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }

    public function inicio(){
       // $top = $this->consultarProductosTop();
       // $vendidos = $this->consultarProductosTopVentas();
       // return view('welcome',compact('top','vendidos'));
    }

    public function productos($pagina = 0 ,$paginacion = 10 ,$categorias = null , $nombre = null) {

       if($categorias == null and $nombre == null){

       }else if($categorias !== null and $nombre == null){

       }else if($categorias == null and $nombre !== null){

       }else if($categorias !== null and $nombre !== null){

       }else{
           $var = 0;
       }

        $datos = [];
       // $respuesta = $this->paginacion->paginacion($pagina,$datos,$paginacion);
        //return respuesta;
        return $datos;

    }

    public function detalle($id) {
       $producto =\DB::table('tb_producto')->where('id',$id)->get();
        //dd($producto);
        $imagenes =\DB::table('tb_imagenes')->where('producto_id',$id)->get();
       return view('modulos.usuario.detalle',compact('producto','imagenes'));


    }

    public function categorias(){
      //return  $this->ProveedorController->consultarCategorias();
    }

    public function subCategorias($categoria){
        return  DB::table('tb_sub_categoria')->where('categoria_id',$categoria)->get();
    }

    public function marcas(){
        return  $this->ProveedorController->consultarMarcas();
    }



    public function paginacion($pagina,$datos) {
        $paginacion = 1; // cuantos datos tenemos que recresar por pagina
        $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
        $page = Input::get('page'); // solo es un nombre
        $total = count($datos);
        $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos
        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);
        $datos->setPath('blog'); // es una ruta X
        return $datos;
    }

    public function consultarColores(Request $resquest) {
       return DB::table('tb_colores')->whereIn('id',$resquest->input('colores'))->get();
    }

    public function consultarComentarios($producto_id,$pagina=0){
        $datos =  $this->TiendaProcedure->consultarComentarios($producto_id,$pagina);   
         return  $this->paginacionComentarios($pagina,$datos);
    }

    public function consultarPromedioProductos($producto_id){
        return  $this->TiendaProcedure->consultarPromedioProductos($producto_id);
          
    }

    public function guardarComentarios(Request $request) {

    }

      public function loadData($pagina = 0) {
            $datos =  $this->SeguridadProcedure->consultarPermisosTodos();
    }

    public function paginacionComentarios($pagina,$datos) {
        $paginacion = 4; // cuantos datos tenemos que recresar por pagina
        $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
        $page = Input::get('page'); // solo es un nombre
        $total = count($datos);
        if($total == 0){
            return "sin datos";
        }
        $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos
        //Echo $total.'-'.$paginacion.'-'.$page;
        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);


        $datos->setPath('blog'); // es una ruta X
        return $datos;

    }




    public function validarSesion() {

    }

    public function iniciarSesion(Request $request){


    }

    private function logear(Request $request){

    }

    private function crearUsuario(Request $request){


    }

    public function comprar($producto_id) {

    }
}
