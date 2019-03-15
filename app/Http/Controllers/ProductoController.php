<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;
use Illuminate\Support\Facades\Storage;
//use Iluminate\Http\File;

class ProductoController extends Controller
{

    protected $xml;
    protected $paginacion;
    protected $metodo = 'excecAdmi';

    public function __construct(XmlController $xml, PaginacionController $paginacion)
    {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }

    public function index()
    {
        //
        return view('modulos.producto.index');
    }

   
    
    public function store(Request $request)
    {
        
       
        $nombre1 = '' ; 
        $nombre2 =  ''; 
        $nombre3 = '' ; 
        $nombre4 = '' ; 
        $nombre5 = '' ; 

       
        $ruta = "/storage/productos/";

        if( $request->file('foto1')->store('')){
            $nombre1 = $request->file('foto1')->store('');
            $nombre1 = $ruta.$nombre1;
        }
        if($request->file('foto2')->store('')){
             $nombre2 = $request->file('foto2')->store('');
            $nombre2 = $ruta.$nombre2;
        }
        if($request->file('foto3')->store('')){
             $nombre3 = $request->file('foto3')->store('');
            $nombre3 = $ruta.$nombre3;
        }
        if($request->file('foto4')->store('')){
             $nombre4 = $request->file('foto4')->store('');
            $nombre4 = $ruta.$nombre4;
        }
        if($nombre2 = $request->file('foto5')->store('')){
            $nombre5 =  $nombre2 = $request->file('foto5')->store('');
            $nombre5 = $ruta.$nombre5;
        }

       /* insert a las tablas */
        $insert = $this->xml->query($request,'pr_ins_va_comercio_productos' ,$this->metodo);
        
        /* obtener el id y hacer un nuevo insert */
        $variable = array($nombre1, nombre2, nombre3, nombre4, nombre5);

        foreach ($variable as $value) {
            $array = array(
                'big_pf_idProductoFotos' => null,
                'big_pf_idComercioProducto' => $request->input('big_pf_idComercioProducto'),
                'big_pf_idComercio' => $request->input('big_cp_idComercio'), 'var_pf_ruta' => $value,
                'var_pf_nombreArchivo' => substr($value,( strrpos($value, '/') + 1)), 'bit_pf_habilitado' => '1'
            );
            $this->xml->query($array,'pr_ins_va_co mercio_productos',$this->metodo );

        }
        
        

        flash()->error("Error");
         return back()->withInput();
       
    }


    public function update(Request $request)
    {
      //tODO ELIMINAR LAS IMAGENES QUE SON ACTUALIZADAS
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
    }

    public function show($id){
        return view('modulos.producto.show');
    }

    public function edit($id)   {
        return view('modulos.producto.edit');
    }



    public  function create(){
        return view('modulos.producto.create');
    }
}
