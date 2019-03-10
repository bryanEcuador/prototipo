<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PaginacionController;

class XmlController extends Controller
{
    protected $paginacion;
    public function __construct(PaginacionController $paginacion)
    {
        $this->paginacion = $paginacion;
    }

    public function makeXml($array,$cabecera)
    {
        //dd($cabecera);
        
        $objetoXML = new \XMLWriter(); // instancio la clase
       
        // Estructura básica del XML
        //$objetoXML->openMemory();
        $objetoXML->openURI("ejemplo.xml");
        $objetoXML->setIndent(true);
        $objetoXML->setIndentString("\t");
        $objetoXML->startDocument('1.0', 'utf-8'); // inicio del documento
	// Inicio del nodo raíz
        $objetoXML->startElement($cabecera); // inicio del nodo raiz


        foreach ($array as $key => $value) {
                /* echo $key . " " . $value; */
            $objetoXML->startElement($key);
            if(is_numeric($key)){
                $type = 'System.Int32';
            }else if(is_string($key)){
                $type = 'System.String';
            }
            $objetoXML->writeAttribute('Type', $type);
            $objetoXML->text($value);
            $objetoXML->fullEndElement(); // Final del elemento "obra" que cubre cada obra de la matriz.
        }
        $objetoXML->fullEndElement(); // Final del elemento "obra" que cubre cada obra de la matriz.
        $objetoXML->endElement(); // Final del nodo raíz, "ejemplos"
        $objetoXML->endDocument(); // Final del documento
        //$cadenaXML = trim($objetoXML->outputMemory());

        //return $cadenaXML;

    }

    public function soap()
    {

        $client = new \SoapClient("http://webservice/services/ControlAssistencia?wsdl", array('trace' => 1));
        return $client;
    }

    public function readXml($xml) {
        $arreglo = \simplexml_load_string($xml);
        return $arreglo;
    }

    public function makeArray(Request $request){
        $parametros = array();

        foreach ($request->all() as $key => $value) {
            if ($key == '_token') {
                $insertado = array('var_lg_login' => 1);
                $parametros = array_merge($parametros, $insertado);
            } else {
                $insertado = array($key => $value);
                $parametros = array_merge($parametros, $insertado);
            }

        }

        return $parametros;
    }

    public function query($request ,$cabecera,$metodo,$busqueda = null,$pagina=null,$paginacion=null){

        $data = $this->makeArray($request);
        $datos = $this->makeXml($data,$cabecera);
        $cliente = $this->soap();
        $parametros = array('parametros' => $datos);
        $response = $cliente->$metodo($parametros);
        if($busqueda == null){
            return $this->readXml($response);
        } else {
            $response  = $this->paginacion->paginacion($pagina,$response,$paginacion);
            return response()->json($response);
        }
    }
    

}
