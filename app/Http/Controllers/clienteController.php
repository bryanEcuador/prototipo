<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;

 

class clienteController extends Controller
{
    protected $xml;
    private $cabecera = "pr_ins_va_clientes"; 
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

    public function search(){

        $data = array('id'=> 1 ,'tipo_identificacion' => 'cedula' , 'identificacion' => '0952013225' , 'nombres' => 'bryan' , 'apellidos' => 'silva' , 'ciudad' => 'guayaquil' , 'telefono' => '09039302930' , 'email' => 'email'  );

        return $data;
        return Response::json($data);
        //dd($data);

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
 
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this->cabecera);
        $cliente = $this->xml->soap();
       
        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);         

        //
           
    }

  
    public function update(Request $request)
    {
        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);         

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
    }

   

   
}