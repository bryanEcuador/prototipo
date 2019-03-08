<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaccionBancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modulos.transaccion_banco.index');
    }


    public function store(Request $request)
    {
        return $this->xml->query($request,'pr_ins_va_transaccion_banco',$this->metodo);
    }

    public function update(Request $request)
    {
        return $this->xml->query($request,'pr_upd_va_transaccion_banco',$this->metodo);
    }

    public function search($paginacion = 5, $pagina=0 , $nombre = null){

        if($nombre == null){
            $parametros = array('big_tb_idTransaccion' => 0 , 'int_tipoConsulta' => 1   , 'var_co_nombreComercio' => '');

        }else {
            $parametros = array('big_tb_idTransaccion' => 0 , 'int_tipoConsulta' => 2   , 'var_co_nombreComercio' => $nombre);
        }

        return $this->xml->query($parametros,'pr_sel_va_transaccion_banco',$this->metodo, true,$pagina,$paginacion);
    }


    public function consult($id)
    {
        $parametros = array('big_tb_idTransaccion' => $id , 'int_tipoConsulta' => 0 , 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros,'pr_sel_va_transaccion_banco',$this->metodo);
    }


}
