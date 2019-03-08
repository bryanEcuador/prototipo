<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

class ProcesoController extends Controller
{

    protected $xml;
    protected $paginacion;
    private $metodo = "nombre del metodo";


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

        $parametros = array('big_td_idTransaccionDetalle' => 0 , 'int_tipoConsulta' => 1   , 'var_co_nombreComercio' => '');
        $datos = $this->xml->makeXml($parametros,'');
        $cliente = $this->xml->soap();
        $response = $cliente->$this->metodo($datos);
        $datos = $this->xml->readXml($response);
        return view('modulos.proceso.index' , compact('datos'));
    }

    

}
