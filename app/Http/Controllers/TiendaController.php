<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\ProveedorController;
use App\Core\Procedimientos\TiendaProcedure;

class TiendaController extends Controller {

    protected $ProveedorController;
    protected $TiendaProcedure;
    public  $categorias;
    public  $subcategorias;
    public  $marca;
   
    public function __construct(ProveedorController $proveedorController, TiendaProcedure $tiendaProcedure)
    {
        $this->ProveedorController  = $proveedorController;
        $this->TiendaProcedure = $tiendaProcedure;
    }

    public function inicio(){
        $top = $this->consultarProductosTop();
        $vendidos = $this->consultarProductosTopVentas();
        return view('welcome',compact('top','vendidos'));
    }

    public function productos($pagina = 0) {

        $pagina != 0 ? $pagina = $pagina - 1 : $pagina  = 0;
        $paginacion = 1;
        $total = count(\DB::select(\DB::raw('CALL prototipo.spConsultarProductosTodos()')));
        $page = Input::get('page');

        $posts = \DB::select(\DB::raw('CALL prototipo.spConsultarProductosTodos()'));
        $posts = array_slice($posts, $pagina , $paginacion);
        $posts = new LengthAwarePaginator($posts, $total, 1, $page);

        $posts->setPath('blog');

        return $posts;
    }

    public function detalle($id) {
        $producto =\DB::table('tb_producto')->where('id',$id)->get();
        //dd($producto);
        $imagenes =\DB::table('tb_imagenes')->where('producto_id',$id)->get();
        return view('modulos.usuario.detalle',compact('producto','imagenes'));
    }

    public function categorias(){
      return  $this->ProveedorController->consultarCategorias();
    }

    public function subCategorias($categoria){
        return  DB::table('tb_sub_categoria')->where('categoria_id',$categoria)->get();
    }

    public function marcas(){
        return  $this->ProveedorController->consultarMarcas();
    }

    public function filtro(Request $request,$pagina = 0){
        try {

            $this->categorias  = $request->input('categoria');
            $this->subcategorias = $request->input('subcategoria');
            $this->marca = $request->input('marca');
           // dd($request->input());
          $datos =  DB::table('tb_producto')
                ->where([
                    ['id_categoria','in',[1]],
                ])
                ->get();
            dd($datos);
          return $this->paginacion($pagina,$datos);


        }catch (QueryException $exception){
            return $exception;
        }
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
  
        
        $request->validate(
            ['usuario' => 'required|string|max:15|min:3|',
              'comentario' => 'required|string',
              'calificacion' => 'required',   
              'producto' => 'required'

            ]
        );
        try{
            $this->TiendaProcedure->guardarComentario($request->input('usuario'),$request->input('comentario'),$request->input('calificacion'),$request->input('producto'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
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

    public function consultarProductosTop(){

        return  $this->TiendaProcedure->consultarProductosTop();
    }

    public function consultarProductosTopVentas(){
        return  $this->TiendaProcedure->consultarProductosTopVentas();
    }
}
