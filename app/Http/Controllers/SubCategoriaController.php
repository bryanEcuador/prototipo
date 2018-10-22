<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class SubCategoriaController extends Controller
{
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
            DB::table('tb_sub_categoria')->insert(['nombre' => $request->input('nombre') , 'categoria_id' => $request->input('categoria')]);
        }catch (QueryException $exception){
            return $exception->getMessage();
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
            DB::table('tb_sub_categoria')
                ->where('id',$request->input('id'))
                ->update(['nombre' => $request->input('nombre') , 'categoria_id' => $request->input('categoria')]);
        }catch (QueryException $exception){
            return $exception->getMessage();
        }
    }

    public function delete(Request $request) {
        try{
            DB::table('tb_sub_categoria')->where('id',$request->input('id'))->update(['estado' => 0]);
        }catch (QueryException $exception){
            return $exception->getMessage();
        }
    }

    public function loadData($pagina = 0,$nombre = null) {
        if($nombre == null) {
            //\DB::select('Call spEstadisticaRegistrosIngresoHospitalizacionYears');
            $datos = \DB::select(\DB::raw('CALL prototipo.spConsultarSubCategoriaTodos()'));
            return  $this->paginacion($pagina,$datos);
        } else {
            return $this->search($nombre,$pagina);
        }

    }

    public function search($nombre,$pagina = 0) {
        $datos = DB::select('Call spConsultarSubCategoria(?)',array($nombre));
        return  $this->paginacion($pagina,$datos);
    }

    public function paginacion($pagina,$datos) {
        $paginacion = 2; // cuantos datos tenemos que recresar por pagina
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
        return db::select('call spConsultarCategoriasTodos()');
    }
}
