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
    protected $metodo;

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
        $ruta = "/storage/productos/";

        $nombre1 = $request->file('foto1')->store('');
        $nombre2 = $request->file('foto2')->store('');
        $nombre3 = $request->file('foto3')->store('');
        $nombre4 = $request->file('foto4')->store('');
        $nombre5 = $request->file('foto5')->store('');

        $nombre1 = $ruta.$nombre1;
        $nombre2 = $ruta.$nombre2;
        $nombre3 = $ruta.$nombre3;
        $nombre4 = $ruta.$nombre4;
        $nombre5 = $ruta.$nombre5;


        flash()->error("Error");
         return back()->withInput();
        /* $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);    */
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
       /*  $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);   */
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
