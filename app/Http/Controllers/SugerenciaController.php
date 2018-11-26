<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\Procedimientos\SugerenciaProcedure;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\ColorController;
class SugerenciaController extends Controller
{
    protected $MarcaController;
    protected $CategoriaController;
    protected $SubCategoriaController;
    protected $ColorController;

    public function  __construct(CategoriaController $categoriaController , SubCategoriaController $subCategoriaController, MarcaController $marcaController, ColorController $colorController)
    {
        $this->CategoriaController = $categoriaController;
        $this->SubCategoriaController = $subCategoriaController;
        $this->MarcaController = $marcaController;
        $this->ColorController = $colorController;
    }

    public function index(){
        return view('modulos.proveedor.sugerencias');

 }

    public function managerView( ){
        return view('modulos.administracion.sugerencias');
    }
  public function suggestionList($id){
        return DB::table('sugerencias')->where('tipo_sugerencia',$id)->get();
 }

 public function storeSuggestion(Request $request){


    switch ($request->input('idSugerencia')){
        case 1 :
            try {
               return $this->CategoriaController->store($request);
            }catch (QueryException $e){
                return $e;
            }

            break;
        case 2 :
            try {
               return $this->SubCategoriaController->store($request);
            }catch (QueryException $e){
                return $e;
            }
            break;
        case 3 :
            try {
              return  $this->MarcaController->store($request);
            }catch (QueryException $e){
                return $e;
            }
            break;
        case 4 :
            try {
              return  $this->ColorController->store($request);
            }catch (QueryException $e){
                return $e;
            }
            break;
        default :
    }


 }

 public function  deleteSuggestion(Request $request){
     DB::table('sugerencias')->where('id',$request->input('id'))->delete();
 }
 public function store(Request $request) {
        $request->validate(
            ['nombre' => 'required|string|max:15|min:3|',
              'sugerencia' => 'required'
            ],
            [   'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'EL nombre no pued contener numeros',
                'nombre.max' => 'EL nombre solo puede contener 15 caracteres',
                'nombre.min' => 'EL nombre no puede contener menos de 3 caracteres',

                'categoria.required' => 'El nombre es requerido',
            ]
        );
        try{

            $this->SugerenciaProcedure->guardar($request->input('sugerencia'),$request->input('usuario'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function update(Request $request) {
        $request->validate(
            ['sugerencia' => 'required|string|max:100|min:3|',
                'sugerencia' => 'required'
            ],
            [   'sugerencia.required' => 'El nombre es requerido',
                'sugerencia.string' => 'EL nombre no pued contener numeros',
                'sugerencia.max' => 'EL nombre solo puede contener 100 caracteres',
                'sugerencia.min' => 'EL nombre no puede contener menos de 3 caracteres',

                'sugerencia.required' => 'El nombre es requerido',
            ]
        );
        try{
            $this->SugerenciaProcedure->actualizar($request->input('id'),$request->input('sugerencia'),$request->input('usuario'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function delete($id) {
        try{
            $this->SugerenciaProcedure->eliminar($id);
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function  acceptSuggestion(Request $request){

    }

}