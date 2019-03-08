<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;


class ComercioController extends Controller
{
    protected $xml;
    protected $paginacion;
    private $metodo;

    public function __construct(XmlController $xml , PaginacionController $paginacion)
    {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }

    public function index()
    {
        return view("modulos.comercio.index");
    }

  
    public function store(Request $request)
    {
        return $this->xml->query($request,'cabecera',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'cabecera',$this->metodo);
    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){
 
        if($nombre == null){
            $parametros = array('big_co_idComercio' => 0 , 'int_tipoConsulta' => 1   , 'var_co_nombreComercio' => '');

        }else {
            $parametros = array('big_co_idComercio' => 0 , 'int_tipoConsulta' => 2   , 'var_co_nombreComercio' => $nombre);
        }

        return $this->xml->query($parametros,'cabecera',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    { 
        $parametros = array('big_co_idComercio' => $id , 'int_tipoConsulta' => 0 , 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros,'cabecera',$this->metodo);
    }

   

   
}
