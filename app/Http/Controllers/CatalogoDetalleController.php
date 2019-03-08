<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;


class CatalogoDetalleController extends Controller
{
    protected $xml;
    private $metodo;

    public function __construct(XmlController $xml)
    {
        $this->xml = $xml;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('modulos.catalogo_detalle.index');
    }


    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_catalogo_detalle',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_catalogo_detalle',$this->metodo);

    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){

        if($nombre == null){
            $parametros = array('int_cc_idCatalogoDetalle' => 0 , 'int_tipoConsulta' => 1   , 'var_cd_descripcion' => '');

        }else {
            $parametros = array('int_cc_idCatalogoDetalle' => 0 , 'int_tipoConsulta' => 2   , 'var_cd_descripcion' => $nombre);
        }

        return $this->xml->query($parametros,'cabecera',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    {
        $parametros = array('int_cc_idCatalogoDetalle' => $id , 'int_tipoConsulta' => 0 , 'var_cd_descripcion' => '');
        return $this->xml->query($parametros,'cabecera',$this->metodo);
    }
}
