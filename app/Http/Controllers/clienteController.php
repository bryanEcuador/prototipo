<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

 

class clienteController extends Controller
{
    protected $xml;
    protected $paginacion;
    protected $metodo = 'excecAdmi';

     
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

        $parametros = $this->xml->makeArray($request);
        $datos = $this->xml->makeXml($parametros,'pr_upd_va_clientes') ;
        
        $cliente = new \SoapClient("http://localhost:42678/ServiciosVeryApe.svc?wsdl", array('trace' => 1, 'exceptions' => true,'keep _alive' => true,'feat ures' => SOAP_SINGLE_ELEMENT_ARRAYS, 'soap_version'=> 'S OAP_1_1' ));

         $parametros = array('xml' => $datos);
        $response = $cliente->execMain($parametros);
        dd($response);
           
    }

  
    public function update(Request $request)
    {
        return $this->xml->query($request, 'pr_upd_va_clientes',$this->metodo);

    }

    public function consult($id){
        $parametros = array( 'big_cl_idCliente' => $id, 'int_tipoConsulta' => 0, 'var_co_nombreComercio' => '');
        return $this->xml->query($parametros, 'pr_sel_va_clientes', $this->metodo);
    }

   

   
}