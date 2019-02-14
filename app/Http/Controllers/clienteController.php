<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;

 

class clienteController extends Controller
{
    protected $xml;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(XmlController $xml) {
        $this->xml = $xml;
    }


    public function index()
    {
        //
        return view("modulos.cliente.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("modulos.cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $cabecera = "pr_ins_va_clientes ";     
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$cabecera);
        $cliente = $this->xml->soap();
       
        // llamamos al metodo que vamos a consumir
        $response = 'metodo';
        return $this->xml->readXml($response);         

        //
       
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        //
        return view("modulos.cliente.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        //
        return view("modulos.cliente.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function research($id)
    {

    }

   
}