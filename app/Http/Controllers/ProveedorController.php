<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
class ProveedorController extends Controller
{
    public function index(){
        $datos = array();
        return view('modulos.proveedor.index',compact('datos'));
    }
    public function create(){
        return view('modulos.proveedor.create');
    }

    public function store(Request $request){

        dd($request);
        // verificamos los inputs

        $request->validate([
            'nombre' => 'required|max:25|string',
            'codigo' => 'required|max:10',
            'categoria'=> 'required|string',
            'sub_categoria'=> 'required|string',
            'marca'=> 'required|string',
            'descripcion' => 'required|max:50|min:15|string',
            'precio' => 'required|min:0|numeric',
            'iva' => 'required|max:100|min:0|numeric',
            'colores' => 'required',
            'file' => 'required|image|mimes:png, jpeg\'',
        ],[
            'nombre.max' => 'El nombre del producto solo puede tener un maximo de 25 caracteres',
            'nombre.string' => 'El nombre del producto no puede ser un numero',
            'codigo.max' => 'El codigo del producto solo puede tener un maximo de 10 caracteres',
            'descripcion.max' => 'La descripcion solo puede tener un maximo de 50 caracteres',
            'descripcion.min' => 'La descripcion solo puede tener un minimo de 15 caracteres',
            'precio.numeric' => 'El precio solo puede contener numeros',
            'iva.numeric' => 'El iva solo puede contener numeros',

            'nombre.required' => 'El nombre del producto es requerido',
            'codigo.required' => 'El nombre del producto es requerido',
            'categoria.required' => 'El nombre del producto es requerido',
            'sub_categoria.required' => 'El nombre del producto es requerido',
            'marca.required' => 'El nombre del producto es requerido',
            'descripcion.required' => 'El nombre del producto es requerido',
            'precio.required' => 'El nombre del producto es requerido',
            'iva.required' => 'El nombre del producto es requerido',
            'colores.required' => 'El nombre del producto es requerido',
            'file.required' => 'Las imagenes del producto son requeridas',
            'file.imagen' => 'Solo puede subir imagenes',
            'file.mine' => 'No se aceptan imagenes de ese tipo',
        ]);

        $nombre_imagenes = array();
        // preguntamos cuantos inpuuts tipo imagen pasaron y el numero de colores elegidos
        $archivos = count($request->file());
        $colores = count($request->input('colores'));

        // creamos un array con el nombre de todos los archivos de imagenes
        for($i = 0 ; $i<$archivos;$i++)
        {
            $n = $i + 1;
            array_push($nombre_imagenes,"img".$n);
        }
        // si el numero no coincide redirigimos de nuevo a la vista de create
        if($archivos !== $colores){
            return redirect()->route ('proveedor.create')->with('danger', "El numero de colores elegidos no coinciden con el numero de archivos cargados");
        } else {
            foreach ($nombre_imagenes as $valor)
            {
                // verificamos que todos los archivos tengan entre 3 y 5  imagenes
                $numero  = count($request->file($valor));
                if($numero < 3 )
                {
                    return redirect()->route ('proveedor.create')->with('danger', "Debe que subir minimo 3 imagenes por color");
                } else if($numero > 5 ){
                    return redirect()->route ('proveedor.create')->with('danger', "Debe que subir maximo 5 imagenes por color");
                }
            }

        }


        try {
            // vamos a pasar a guardar en la base de datos si surge un error no deberían enviarse las imagenes


            // pasamos a cargar las imagenes
            foreach ($nombre_imagenes as $valor){
                $file = $request->file($valor);
                ($file[0]->getClientOriginalName());
                for($i =0 ; $i< count($file); $i++){
                    $nombre = $file[$i]->getClientOriginalName();
                    $nombre = time().$nombre;
                    Storage::disk('public')->put($nombre,  \File::get($file['avatar']));
                }
                // por aquí va la logica para guardar las imagenes
                return redirect()->route ('proveedor.create')->with('success', "producto creado con exito");
            }
        }catch (QueryException $e){
            return redirect()->route ('proveedor.create')->with('danger', "Error".$e->errorInfo[1]);
        }

        return redirect()->route ('proveedor.create')->with('danger', "Error");
    }
}
