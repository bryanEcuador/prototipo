<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;


class CatalogoDetalleController extends Controller
{
    protected $xml;
    private $cabecera = "pr_ins_va_clientes";

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modulos.catalogo_detalle.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

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
        return view('modulos.catalogo_detalle.show');
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
        return view('modulos.catalogo_detalle.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);         

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this ->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);         

        //
    }
}
