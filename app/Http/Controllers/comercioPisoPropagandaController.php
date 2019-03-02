<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comercioPisoPropagandaController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("modulos.comercio_piso_propaganda.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("modulos.comercio_piso_propaganda.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $xml = this . xml($request);
        $response = this . sendData($request);
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
        return view("modulos.comercio_piso_propaganda.show");
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
        return view("modulos.comercio_piso_propaganda.edit");
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

    public function xml(Request $request)
    {
        $input = $request->all(); // obtengo todos los datos del formulario

        $objetoXML = new \XMLWriter(); // instancio la clase
       
        // Estructura básica del XML
        $objetoXML->openMemory();
        $objetoXML->setIndent(true);
        $objetoXML->setIndentString("\t");
        $objetoXML->startDocument('1.0', 'utf-8'); // inicio del documento
	// Inicio del nodo raíz
        $objetoXML->startElement("ejemplos"); // inicio del nodo raiz
        $objetoXML->startElement("ejemplo"); // Se inicia un elemento para cada obra.

        foreach ($input as $key => $value) {
                /* echo $key . " " . $value; */
            $objetoXML->writeAttribute($key, $value);
        }
        $objetoXML->fullEndElement(); // Final del elemento "obra" que cubre cada obra de la matriz.
        $objetoXML->endElement(); // Final del nodo raíz, "ejemplos"
        $objetoXML->endDocument(); // Final del documento
        $cadenaXML = trim($objetoXML->outputMemory());


    }

    public function sendData($xml)
    {
        
    //url del webservice
        $wsdl = "https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
        $client = new nusoap_client($wsdl, 'wsdl');

    //pasando los parámetros a un array
        $param = $xml;

    //llamando al método y pasándole el array con los parámetros
        $resultado = $client->call('metodo', $param);

        return $resultado;
    }
}