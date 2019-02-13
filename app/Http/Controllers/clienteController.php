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

         $clerk = array(
            "user" => "Scott",
        );
        $other = array('other' => 'xxxxx');
        $clerk = arrary_merge($other, $clerk);
        print_r($clerk); 
      
      
        dd($request->all());

        $parametros = [];

        foreach ($request->all() as $key => $value){
            //array_push($parametros,$value);
            $parametros = array_merge($key, $value);
        }
        dd($parametros);

        $input = $request->all(); // obtengo todos los datos del formulario

        $objetoXML = new \XMLWriter(); // instancio la clase
       
        // Estructura básica del XML
        $objetoXML->openMemory();
        $objetoXML->setIndent(true);
        $objetoXML->setIndentString("\t");
        $objetoXML->startDocument('1.0', 'utf-8'); // inicio del documento
	// Inicio del nodo raíz
        $objetoXML->startElement("pr_ins_va_clientes"); // inicio del nodo raiz
        

        foreach ($input as $key => $value) {
                /* echo $key . " " . $value; */
            $objetoXML->startElement($key);
            $objetoXML->writeAttribute('Type', 'System.String'); 
            $objetoXML->text($value);
            $objetoXML->fullEndElement(); // Final del elemento "obra" que cubre cada obra de la matriz.
        }
        $objetoXML->fullEndElement(); // Final del elemento "obra" que cubre cada obra de la matriz.
        $objetoXML->endElement(); // Final del nodo raíz, "ejemplos"
        $objetoXML->endDocument(); // Final del documento
        $cadenaXML = trim($objetoXML->outputMemory());

       

       // $datos = $this->xml->makeXml($request);
      // $response = $this->xml->sendData($datos);
      // return $this->xml->readXml($response); 

        $clientes = \simplexml_load_string($cadenaXML);
        dd($clientes);
           
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