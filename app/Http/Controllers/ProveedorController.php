<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
class ProveedorController extends Controller
{
    public function index(){
        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')->get();
        //dd($datos);
        return view('modulos.proveedor.index',compact('datos'));
    }
    public function create(){
        return view('modulos.proveedor.create');
    }

    public function store(Request $request){

        //dd($request);
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
            //'file' => 'required|image|mimes:png, jpeg\'',
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
            //'file.required' => 'Las imagenes del producto son requeridas',
            'file.imagen' => 'Solo puede subir imagenes',
            'file.mine' => 'No se aceptan imagenes de ese tipo',
        ]);

        $nombre_imagenes = array();
        $archivos = count($request->file()); // numero de archivos pasados
        $colores_valor = $request->input('colores'); // colores elegidos
        $colores = count($request->input('colores')); // numero de colores elegidos


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
                $producto_id = \DB::table('tb_producto')->insertGetId(
                    [
                        'id_categoria' => $request->input('categoria') ,
                        'id_sub_categoria' => $request->input('sub_categoria') ,
                        'id_marca' => $request->input('marca') ,
                        'nombre' => $request->input('nombre') ,
                        'codigo' => $request->input('codigo') ,
                        'descripcion' => $request->input('descripcion') ,
                        'precio' => $request->input('precio') ,
                        'iva' => $request->input('iva')
                    ]
                );


            $x = 0;

            foreach ($nombre_imagenes as $valor){ // recorro todos los archivos de imagenes
                $imagenes = array(); // creamos un array para guardar las imagenes de cada archivo
                $file = $request->file($valor); // guardo el array de la imagen
                for($i =0 ; $i< count($file); $i++){
                    $nombre = $file[$i]->getClientOriginalName(); // obtengo el nombre de la imagen
                    $nombre = time().$nombre; // le concateno el tiempo para que esta sea unica
                    Storage::disk('public')->put($nombre,  \File::get($file[$i])); // la guardo en el disco
                    array_push($imagenes,$nombre);
                }

                // por aquí va la logica para guardar las imagenes
                if(count($imagenes) == 3) {
                    //dd($colores_valor);
                    \DB::table('tb_imagenes')->insert([
                        'producto_id' => $producto_id,
                        'color_id' => $colores_valor[$x],
                        'imagen1' => $imagenes[0],
                        'imagen2' => $imagenes[1],
                        'imagen3' => $imagenes[2],
                    ]);
                } elseif (count($imagenes) == 4) {
                    \DB::table('tb_imagenes')->insert([
                        'producto_id' => $producto_id,
                        'color_id' => $colores_valor[$x],
                        'imagen1' => $nombre_imagenes[0],
                        'imagen2' => $nombre_imagenes[1],
                        'imagen3' => $nombre_imagenes[2],
                        'imagen4' => $nombre_imagenes[3],


                    ]);
                } else {
                    \DB::table('tb_imagenes')->insert([
                        'producto_id' => $producto_id,
                        'color_id' => $colores_valor[$x],
                        'imagen1' => $nombre_imagenes[0],
                        'imagen2' => $nombre_imagenes[1],
                        'imagen3' => $nombre_imagenes[2],
                        'imagen4' => $nombre_imagenes[3],
                        'imagen5' => $nombre_imagenes[4],
                    ]);

                }
                $x = $x +1;
            }
            return redirect()->route ('proveedor.create')->with('success', "producto creado con exito");
        }catch (QueryException $e){
            return redirect()->route ('proveedor.create')->with('danger', "Error".$e->errorInfo[1]);
        }

        //return redirect()->route ('proveedor.create')->with('danger', "Error");
    }

    public function  show($id) {

        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        //dd($imagenes);
        return view('modulos.proveedor.show',compact('datos','imagenes'));
    }

    public function  edit($id) {

        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        return view('modulos.proveedor.edit',compact('datos','imagenes'));
    }

    public function consultarCategorias(){
        return \DB::table('tb_categoria')->distinct()->get();
    }
    public function consultarSubCategorias(){
        return \DB::table('tb_sub_categoria')->distinct()->get();
    }
    public function consultarMarcas(){
        return \DB::table('tb_marca')->distinct()->get();
    }

    public function consultarColores(){
        return \DB::table('tb_colores')->distinct()->get();
    }
}
