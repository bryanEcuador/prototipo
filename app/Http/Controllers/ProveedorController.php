<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class ProveedorController extends Controller
{
   // protected $LoginController;

   // public function __construct(LoginController $loginController)
   // {
    //    $this->LoginController = $loginController;
   // }

    // funciones del crud
    public function index(){
        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')->get();
        //dd($datos);
        return view('modulos.proveedor.index',compact('datos'));
    }
    public function create(){
        return view('modulos.proveedor.create');
    }
    public function update(Request $request)
    {

           //preguntamos si nos estan pasando imagenes para guardarlo en el storage
        if(count($request->file()) > 0) {
                // obtenemos el nombre y valor del archivo
            foreach ($request->file() as $clave => $valor){

                $file = $request->file($clave);
                    // obtenemos el nombre y el id para la actualización que se encuentra contenido en la clave
                    // del archivo
                list($nombre,$id) =  explode("-",$clave);
                $imagen = $file->getClientOriginalName(); // obtengo el nombre de la imagen
                $imagen= time().$imagen; // le concateno el tiempo para que esta sea unica
                Storage::disk('public')->put($imagen,  \File::get($file)); // la guardo en el disco

                // realizamos la actualización de la imagen
                $nombre_imagen = '/storage/productos/'.$imagen;
                \DB::table('tb_imagenes')
                    ->where('id',$id)
                    ->update([$nombre => $nombre_imagen]);
            }
            // recorro el request en busca de claves numericas
            // las claves numericas corresponden al id de la tabla imagenes
            // luego se hace la actualización de los colores con su respectivo nuevo color.
            foreach ($request->input() as $clave => $valor)  {
                if( is_numeric($clave) ) {
                    \DB::table('tb_imagenes')
                        ->where('id',$clave)
                        ->update(['color_id' => $valor]);
                }
            }
            //--------------------------------------------- actuaizacion del producto ------------------------
            \DB::table('tb_producto')
                ->where('id',$request->input('id_producto'))
                ->update([
                    'id_categoria'=> $request->input('categoria'),
                    'id_sub_categoria'=> $request->input('sub_categoria'),
                    'id_marca'=> $request->input('marca'),
                    'nombre'=> $request->input('nombre'),
                    'codigo'=> $request->input('codigo'),
                    'descripcion'=> $request->input('descripcion'),
                    'precio'=> $request->input('precio'),
                    'iva'=> $request->input('iva'),
                ]);
        } else {
            // recorro el request en busca de claves numericas
            // las claves numericas corresponden al id de la tabla imagenes
            // luego se hace la actualización de los colores con su respectivo nuevo color.
            foreach ($request->input() as $clave => $valor)  {
                if( is_numeric($clave) ) {
                    \DB::table('tb_imagenes')
                        ->where('id',$clave)
                        ->update(['color_id' => $valor]);
                }
            }
            //--------------------------------------------- actuaizacion del producto ------------------------
            \DB::table('tb_producto')
                ->where('id',$request->input('id_producto'))
                ->update([
                    'id_categoria'=> $request->input('categoria'),
                    'id_sub_categoria'=> $request->input('sub_categoria'),
                    'id_marca'=> $request->input('marca'),
                    'nombre'=> $request->input('nombre'),
                    'codigo'=> $request->input('codigo'),
                    'descripcion'=> $request->input('descripcion'),
                    'precio'=> $request->input('precio'),
                    'iva'=> $request->input('iva'),
                ]);
        }
        flash()->success('se ha actualizado el producto con exito');
        return redirect()->route('proveedor.index');

    }
    public function validarImagenes(){

    }
    public function store(Request $request){

//
        // verificamos los inputs

        $request->validate([
            'nombre' => 'required|max:25|string',
            'codigo' => 'required|max:10',
            'categoria'=> 'required|string',
            'sub_categoria'=> 'required|string',
            'marca'=> 'required|string',
            'descripcion' => 'required|max:250|min:15|string',
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

        //dd($request);
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
                    $ruta = "/storage/productos/";
                    $nombre = $ruta.time().$nombre; // le concateno el tiempo para que esta sea unica
                    Storage::disk('public')->put($nombre,  \File::get($file[$i])); // la guardo en el disco
                    array_push($imagenes,$nombre);
                }

                echo $colores_valor[$x];
                // por aquí va la logica para guardar las imagenes

                if(count($imagenes) == 3) {

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
                        'imagen1' => $imagenes[0],
                        'imagen2' => $imagenes[1],
                        'imagen3' => $imagenes[2],
                        'imagen4' => $imagenes[3],


                    ]);
                } else {
                    \DB::table('tb_imagenes')->insert([
                        'producto_id' => $producto_id,
                        'color_id' => $colores_valor[$x],
                        'imagen1' => $imagenes[0],
                        'imagen2' => $imagenes[1],
                        'imagen3' => $imagenes[2],
                        'imagen4' => $imagenes[3],
                        'imagen5' => $imagenes[4],
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
        $id = decrypt($id);
        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        //dd($imagenes);
        return view('modulos.proveedor.show',compact('datos','imagenes'));
    }
    public function delete($id) {

    }
    public function  edit($id) {
        $id = decrypt($id);
        $datos = \DB::table('tb_producto')->select('id','id_categoria','id_sub_categoria','id_marca','descripcion','nombre','codigo','precio','iva')
            ->where('id',$id)
            ->get();
        $imagenes = \DB::table('tb_imagenes')->select('id','producto_id','color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        return view('modulos.proveedor.edit',compact('datos','imagenes'));
    }

    // funciones extras
    public function agregarImagen(Request $request) {
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName(); // obtengo el nombre de la imagen
        $nombre = time().$nombre; // le concateno el tiempo para que esta sea unica
        Storage::disk('public')->put($nombre,  \File::get($file)); // la guardo en el disco

        $imagen = '/storage/productos/'.$nombre;
        $id_imagen = (integer) $request->input('id_imagen');

        for($i = 1 ; $i<=5;$i++)
        {
            $valor = "imagen".$i;

            $resultado = \DB::table('tb_imagenes')
                ->where([
                    ['id',$id_imagen],
                ])
                ->select($valor)->get();
            if( is_null($resultado[0]->$valor )) {
                \DB::table('tb_imagenes')
                    ->where('id',$id_imagen)
                    ->update([$valor => $imagen ]);
                break;
            }
        }


    }
    public function eliminarImagen(Request $request){


        $id = (integer) $request->input('id');
        $nombre = $request->input('nombre');
        try {
            \DB::table('tb_imagenes')
                ->where('id',$id)
                ->update([ $nombre=> null]);
            return "exito";
        }catch (QueryException $e) {
            //dd($e);
            return $e->errorInfo[2];
        }
    }
    public function validarEliminacionImagenes($id_imagen) {
        $cantidad = 0;
        for($i = 1 ; $i<=5;$i++)
        {
            $valor = "imagen".$i;
            $resultado = \DB::table('tb_imagenes')
                ->where([
                    ['id',$id_imagen],
                ])
                ->select($valor)->get();
            if( is_null($resultado[0]->$valor )) {

            } else {
                $cantidad = $cantidad +1;
            }
        }
            return $cantidad;
    }

    // consultas
    public function consultarImagenes($id) {

        $imagenes = \DB::table('tb_imagenes')->select('id','producto_id','color_id','imagen1','imagen2','imagen3','imagen4','imagen5')
            ->where('producto_id',$id)
            ->get();
        return $imagenes;
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

    public function guardarSugerencia(Request $request, $Sugerencia_id){


        try {
          return  \DB::table('sugerencias')->insertGetId([
                'tipo_sugerencia' => $Sugerencia_id ,
                'sugerencias' => $request->input('sugerencia'),
                'adicional' =>    $request->input('adicional'),
                'usuario' => 1
            ]);

        } catch( QueryException $e ) {
            return $e->getMessage();
        }

    }

    // combos
    public function consultarIva(){
        return \DB::table('tb_iva')->get();
    }
}
