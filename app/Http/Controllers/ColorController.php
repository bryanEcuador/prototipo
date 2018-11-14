<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modulos.administracion.matenimiento.colores.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
            'color' => 'required|string|min:7|max:7'],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'El nombre debe ser de tipo texto',
                'nombre.min' => 'El nombre debe tener minimo 3 caracteres',

                'color.required' => 'El color es requerido',
                'color.string' => 'Escoga un color valido',
                'color.min' => 'Escoga un color valido',
                'color.max' => 'Escoga un color valido',
        ]);

        try {
            DB::table('tb_colores')->insert([
                                                    'nombre' => $request->input('nombre') ,
                                                    'hexadecimal' => $request->input('color'),
                                                    'descripcion' => $request->input('nombre')
                                                    ]);
        }catch (QueryException $exception) {
        $array = array("Error" , $exception->errorInfo[1]);
        return $array;
        }
    }
    public function edit($id)
    {
        return db::table('tb_colores')->where('id',$id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:3',
            'color' => 'required|string|min:7|max:7'],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'El nombre debe ser de tipo texto',
                'nombre.min' => 'El nombre debe tener minimo 3 caracteres',

                'color.required' => 'El color es requerido',
                'color.string' => 'Escoga un color valido',
                'color.min' => 'Escoga un color valido',
                'color.max' => 'Escoga un color valido',
            ]);

        try {
            DB::table('tb_colores')->where('id',$id)
                ->update([
                'nombre' => $request->input('nombre') ,
                'hexadecimal' => $request->input('color'),
                'descripcion' => $request->input('nombre')
            ]);
        }catch (QueryException $exception) {
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

    public function destroy($id)
    {
        //TODO
    }

    public function loadData($paginacion,$pagina = 0,$nombre = null) {
        if($nombre == null) {
            $datos =  DB::table('tb_colores')->get();
            $datos = $datos->toArray();
            return  $this->paginacion($paginacion,$pagina,$datos);
        } else {
            return $this->search($paginacion,$nombre,$pagina);
        }

    }

    public function search($paginacion,$nombre,$pagina = 0) {
        $datos = DB::table('tb_colores')->where('nombre','like',$nombre)->get();
        $datos = $datos->toArray();
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
}
