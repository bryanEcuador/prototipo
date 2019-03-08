<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;

class LiquidacionComercioController extends Controller
{
     protected $xml;
    private $metodo;

    public function __construct(XmlController $xml)
    {
        $this->xml = $xml;
    }

    public function index()
    {
        return view('modulos.liquidacion_comercio.index');
    }

    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_liquidacion_comercios',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_liquidacion_comercios',$this->metodo);
    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){

        if($nombre == null){
            $parametros = array('big_lc_idLiquidacion' => 0 , 'int_tipoConsulta' => 1   , 'var_co_nombreComercio' => '');

        }else {
            $parametros = array('big_lc_idLiquidacion' => 0 , 'int_tipoConsulta' => 2   , 'var_co_nombreComercio' => $nombre);
        }

        return $this->xml->query($parametros,'pr_sel_va_liquidacion_comercios',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    {
        $parametros = array('big_co_idComercio' => $id , 'int_tipoConsulta' => 0 , 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros,'pr_sel_va_liquidacion_comercios',$this->metodo);
    }

}
