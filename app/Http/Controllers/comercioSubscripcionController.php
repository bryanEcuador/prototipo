<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;



class comercioSubscripcionController extends Controller
{

    protected $xml;
    protected $paginacion;
    protected $metodo = 'ExecMain';

    public function __construct(XmlController $xml, PaginacionController $paginacion)
    {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }


    public function index()
    {
        //
        return view("modulos.comercio_suscripcion.index");
    }

    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_comercio_suscripcion_local',$this->metodo);
    }

  
    public function update(Request $request, $id)
    {
        return $this->xml->query($request,'pr_upd_va_comercio_suscripcion_local',$this->metodo);

    }

    public function search($paginacion = 5, $pagina=0,$nombre=null){

        if($nombre == null){
            $parametros = array('big_cs_idComercioSuscripcion' => 0 , 'int_tipoConsulta' => 1   , 'var_co_nombreComercio' => '');

        }else {
            $parametros = array('big_cs_idComercioSuscripcion' => 0 , 'int_tipoConsulta' => 2   , 'var_co_nombreComercio' => $nombre);
        }

        return $this->xml->query($parametros,'pr_sel_va_comercio_suscripcion_local',$this->metodo, true,$pagina,$paginacion);
    }

    public function consult($id){
        $parametros = array('big_cs_idComercioSuscripcion' => $id , 'int_tipoConsulta' => 0 , 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros,'pr_sel_va_comercio_suscripcion_local',$this->metodo);
    }

}