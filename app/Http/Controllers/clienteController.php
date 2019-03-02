<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\PaginacionController;

 

class clienteController extends Controller
{
    protected $xml;
    protected $paginacion;

    private $cabecera = "pr_ins_va_clientes"; 
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

    public function search($pagina = 0, $paginacion = 5, $nombre = null){

        $datos = array(
            ['identificacion' => '0952013225', 'nombres' => 'bryan' , 
            'apellidos' => 'silva mercado' , 'ciudad' => 'guayaquil', 
            'telefono' => '747474' , 'email' => 'bryan@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],

            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'bryan@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],

            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],
            ['identificacion' => '0952013225', 'nombres' => 'bryan',
                'apellidos' => 'silva mercado', 'ciudad' => 'guayaquil',
                'telefono' => '747474', 'email' => 'SILVA@hotmail.com' ],

        );
        
        $respuesta = $this->paginacion->paginacion($pagina,$datos,$paginacion);
        dd($respuesta);

        //return $data;
        //return Response::json($data);
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