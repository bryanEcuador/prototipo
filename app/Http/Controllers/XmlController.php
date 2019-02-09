<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
{
    //

    public function makeXml(Request $request)
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

        return $cadenaXml;

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

    public function readXml($xml) {
        
    }


}
