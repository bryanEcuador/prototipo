<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\ProveedorController;

class TiendaController extends Controller
{
    protected $ProveedorController;
    public  $categorias;
    public  $subcategorias;
    public  $marca;
    public function __construct(ProveedorController $proveedorController)
    {
        $this->ProveedorController  = $proveedorController;
    }

    public function index()
    {
        //

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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

    public function subCategorias(){
        return  $this->ProveedorController->consultarSubCategorias();
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
                    ['id_sub_categoria','in',[1]],
                    ['id_marca','in',[1]],
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


}
