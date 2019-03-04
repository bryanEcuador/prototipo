<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;


class FechaController extends Controller
{
    protected $xml;
    protected $paginacion;


    public function __construct(XmlController $xml, PaginacionController $paginacion)
    {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('modulos.fecha.index');
    }


    public function store(Request $request)
    {
     /*    $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros, 'pr_ins_va_fechas');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);  */
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros, 'pr_upd_va_fechas');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
       /*  $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros, 'pr_upd_va_fechas');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);  */
    }

    public function consult( Request $request){
     
        /* $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros, 'pr_sel_va_fechas');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response); */
    }

    public function search($paginacion = 5, $pagina=0,$consulta = null){
        
         /* $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros, 'pr_sel_va_fechas');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        $dato = $this->xml->readXml($response); */


           /*  $respuesta = $this->paginacion->paginacion($pagina,$dato s,$paginacion);
        //dd($respuesta);
        return response()
            ->json($respuesta); */

       

    }



    
}
