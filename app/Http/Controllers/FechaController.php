<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;


class FechaController extends Controller
{
    protected $xml;
    protected $paginacion;
    protected $metodo = 'excecAdmi';



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
        return $this->xml->query($request,'pr_ins_va_fechas',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_fechas',$this->metodo);
    }


    public function consult($id){
        $parametros = array('big_fc_idFecha' => $id , 'int_tipoConsulta' => 0 );
        return $this->xml->query($parametros, 'pr_sel_va_fechas',$this->metodo);
    }

    public function search($paginacion = 5, $pagina=0,$consulta = null){
        if($consulta == null){
            $parametros = array('big_fc_idFecha' => 0 , 'int_tipoConsulta' => 1);
        }else {
            $parametros = array('big_fc_idFecha' => 0 , 'int_tipoConsulta' => 2 );
        }

        return $this->xml->query($parametros, 'pr_sel_va_fechas',$this->metodo, true,$pagina,$paginacion);
    }



    
}
