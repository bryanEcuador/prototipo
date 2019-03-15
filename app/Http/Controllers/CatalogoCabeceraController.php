<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;

class CatalogoCabeceraController extends Controller
{
    protected $xml;
    protected $metodo = 'excecAdmi';

    public function __construct(XmlController $xml)
    {
        $this->xml = $xml;
    }


    public function index()
    {
        return view('modulos.catalogo_cabecera.index');
    }


    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_catalogo_cabecera',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_catalogo_cabecera',$this->metodo);

    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){

        if($nombre == null){
            $parametros = array('int_cc_idCatalogoCabecera' => 0 , 'int_tipoConsulta' => 1   , 'var_cc_descripcionCatalogo' => '');

        }else {
            $parametros = array('int_cc_idCatalogoCabecera' => 0 , 'int_tipoConsulta' => 2   , 'var_cc_descripcionCatalogo' => $nombre);
        }

        return $this->xml->query($parametros, 'pr_sel_va_catalogo_cabecera',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    {
        $parametros = array('int_cc_idCatalogoCabecera' => $id , 'int_tipoConsulta' => 0 , 'var_cc_descripcionCatalogo' => '');
        return $this->xml->query($parametros, 'pr_sel_va_catalogo_cabecera',$this->metodo);
    }


}
