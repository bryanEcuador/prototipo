<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

 

class clienteController extends Controller
{
    protected $xml;
    protected $paginacion;
    protected $metodo;

     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(XmlController $xml , PaginacionController $paginacion) {
        $this->xml = $xml;
        $this->paginacion = $paginacion;
    }


    public function index()
    {
        //
        return view("modulos.cliente.index");
    }

    public function search($paginacion = 5, $pagina=0){

        $datos = array(
            ['id' => 1, 'identificacion' => '0952013225', 'nombres' => 'bryan' , 
            'apellidos' => 'silva mercado' , 'ciudad' => 'guayaquil', 
            'telefono' => '747474' , 'email' => 'bryan@hotmail.com' ],
            ['id' => 2 ,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['id' => 3 ,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['id' =>  4 ,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],

            ['id' => 5,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['id' => 6,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['id' => 7,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],

            ['id' => 8,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['id' => 9,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['id' => 10,'identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],

        );
        
        $respuesta = $this->paginacion->paginacion($pagina,$datos,$paginacion);
        //dd($respuesta);
        return response()
            ->json( $respuesta) ;

       

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

        // Llamada al WebService
        $client = new \SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
        $result = $client->checkVat([
            'countryCode' => 'DK',
            'vatNumber' => '47458714'
        ]);
        print_r($result);
//
//         $parametros = $this->xml->makeArray($request);
//        $datos = $this->xml->makeXml($parametros,'pr_ins_va_clientes');
//        $parametros = array( 'datos' => $datos);
//        $cliente = $this->xml->soap();
//
//        // llamamos al metodo que vamos a consumir
//        //$response = 'metodo';
//        // $cliente->metodo(paramaetros);
//        $response = $cliente->__soapCall("ExecMain", array($parametros));
//        return $this->xml->readXml($response);

        //
           
    }

  
    public function update(Request $request)
    {
         $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,'pr_upd_va_clientes');
        $cliente = $this->xml->soap();

       $response = $cliente->$this->metodo($datos);

        $response = $this->xml->readXml($response);
        return response()
            ->json( $response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        return 0;
        /* $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,'pr_del_va_clientes');
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);    */      
    }

    public function consult($id){
        /*  $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,$this->cabecera);
        $cliente = $this->xml->soap();

        // llamamos al metodo que vamos a consumir
        $response = 'metodo'; //$cliente->metodo(paramaetros);

        return $this->xml->readXml($response);          */
    }

   

   
}