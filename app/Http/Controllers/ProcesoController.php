<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

class ProcesoController extends Controller
{

    protected $xml;
    protected $paginacion;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(XmlController $xml, PaginacionController $paginacion)
    {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }


    public function index(){

        
        //$cliente = $this->xml->soap();
       
        // llamamos al metodo que vamos a consumir
        //$response = 'metodo'; //$cliente->metodo(paramaetros);

        //$datos = $this->xml->readXml($response);          

        $datos =  array('dato' => 0 );
        return view('modulos.proceso.index' , compact('datos'));
    }

    

}
