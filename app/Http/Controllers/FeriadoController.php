<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;



class FeriadoController extends Controller
{
    protected $xml;
    protected $paginacion;
    protected  $metodo;
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
        return view('modulos.feriados.index');
    }


    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_feriados',$this->metodo);

    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_feriados',$this->metodo);
    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){

        if($nombre == null){
            $parametros = array('big_ff_idFechaFeriado' => 0 , 'int_tipoConsulta' => 1   , 'fch_ff_fecha' => '');

        }else {
            $parametros = array('big_ff_idFechaFeriado' => 0 , 'int_tipoConsulta' => 2   , 'fch_ff_fecha' => $nombre);
        }

        return $this->xml->query($parametros,'pr_sel_va_feriados',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    {
        $parametros = array('big_ff_idFechaFeriado' => $id , 'int_tipoConsulta' => 0 , 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros,'cabecera',$this->metodo);
    }
}
