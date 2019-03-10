<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

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
       /*  $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);      */
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

    }

    public function edit($id){

    }



    public  function create(){
        return view('modulos.producto.create');
    }
}
