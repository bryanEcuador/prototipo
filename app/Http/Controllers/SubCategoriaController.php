<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\Procedimientos\SubCategoriaProcedure;

class SubCategoriaController extends Controller
{
    protected $SubCategoriaProcedure;
    public function __construct(SubCategoriaProcedure $subCategoriaProcedure)
    {
        $this->SubCategoriaProcedure= $subCategoriaProcedure;
    }

   public function index(){
        return view('modulos.administracion.matenimiento.subCategorias.index');
    }
    public function store(Request $request) {
        $request->validate(
            ['nombre' => 'required|string|max:15|min:3|',
              'categoria' => 'required'
            ],
            [   'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'EL nombre no pued contener numeros',
                'nombre.max' => 'EL nombre solo puede contener 15 caracteres',
                'nombre.min' => 'EL nombre no puede contener menos de 3 caracteres',

                'categoria.required' => 'El nombre es requerido',
            ]
        );
        try{

            $this->SubCategoriaProcedure->guardar($request->input('nombre'),$request->input('categoria'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function update(Request $request) {
        $request->validate(
            ['nombre' => 'required|string|max:15|min:3|',
                'categoria' => 'required'
            ],
            [   'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'EL nombre no pued contener numeros',
                'nombre.max' => 'EL nombre solo puede contener 15 caracteres',
                'nombre.min' => 'EL nombre no puede contener menos de 3 caracteres',

                'categoria.required' => 'El nombre es requerido',
            ]
        );
        try{
            $this->SubCategoriaProcedure->actualizar($request->input('id'),$request->input('nombre'),$request->input('categoria'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function delete($id) {
        try{
            $this->SubCategoriaProcedure->eliminar($id);
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function loadData($paginacion,$pagina = 0,$nombre = null) {
        if($nombre == null) {

            $datos = $this->SubCategoriaProcedure->consultarSubCategoriasCategoriasTodos();
            return  $this->paginacion($paginacion,$pagina,$datos);
        } else {
            return $this->search($paginacion,$nombre,$pagina);
        }

    }

    public function search($paginacion,$nombre,$pagina = 0) {
        $datos = $this->SubCategoriaProcedure->consultarSubCategorias($nombre);
        return  $this->paginacion($paginacion,$pagina,$datos);
    }

    public function paginacion($paginacion,$pagina,$datos) {

        $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
        $page = Input::get('page'); // solo es un nombre
        $total = count($datos);
        $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos
        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);
        $datos->setPath('blog'); // es una ruta X
        return $datos;
    }

    public function categorias()
    {
        return $this->SubCategoriaProcedure->categorias();
    }
}
