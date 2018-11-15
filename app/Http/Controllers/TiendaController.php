<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\ProveedorController;
use App\Core\Procedimientos\TiendaProcedure;
use App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Log;

class TiendaController extends Controller {

    protected $ProveedorController;
    protected $TiendaProcedure;
    protected $LoginController;
    public  $categorias;
    public  $subcategorias;
    public  $marca;
   
    public function __construct(ProveedorController $proveedorController, TiendaProcedure $tiendaProcedure, LoginController $loginController)
    {
        $this->ProveedorController  = $proveedorController;
        $this->TiendaProcedure = $tiendaProcedure;
        $this->LoginController = $loginController;
    }

    public function inicio(){
        $top = $this->consultarProductosTop();
        $vendidos = $this->consultarProductosTopVentas();
        return view('welcome',compact('top','vendidos'));
    }

    public function productos($pagina = 0) {

        $pagina != 0 ? $pagina = $pagina - 1 : $pagina  = 0;
        $paginacion = 1;
        $total = count(\DB::select(\DB::raw('CALL prototipo.spConsultarProductosTodos()')));
        $page = Input::get('page');

        $posts = \DB::select(\DB::raw('CALL prototipo.spConsultarProductosTodos()'));
        $posts = array_slice($posts, $pagina , $paginacion);
        $posts = new LengthAwarePaginator($posts, $total, 1, $page);

        $posts->setPath('blog');

        return $posts;
    }

    public function detalle($id) {
        $producto =\DB::table('tb_producto')->where('id',$id)->get();
        //dd($producto);
        $imagenes =\DB::table('tb_imagenes')->where('producto_id',$id)->get();
        return view('modulos.usuario.detalle',compact('producto','imagenes'));
    }

    public function categorias(){
      return  $this->ProveedorController->consultarCategorias();
    }

    public function subCategorias($categoria){
        return  DB::table('tb_sub_categoria')->where('categoria_id',$categoria)->get();
    }

    public function marcas(){
        return  $this->ProveedorController->consultarMarcas();
    }

    public function filtro(Request $request,$pagina = 0){
        try {

            $this->categorias  = $request->input('categoria');
            $this->subcategorias = $request->input('subcategoria');
            $this->marca = $request->input('marca');
           // dd($request->input());
          $datos =  DB::table('tb_producto')
                ->where([
                    ['id_categoria','in',[1]],
                ])
                ->get();
            dd($datos);
          return $this->paginacion($pagina,$datos);


        }catch (QueryException $exception){
            return $exception;
        }
    }

    public function paginacion($pagina,$datos) {
        $paginacion = 1; // cuantos datos tenemos que recresar por pagina
        $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
        $page = Input::get('page'); // solo es un nombre
        $total = count($datos);
        $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos
        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);
        $datos->setPath('blog'); // es una ruta X
        return $datos;
    }

    public function consultarColores(Request $resquest) {
       return DB::table('tb_colores')->whereIn('id',$resquest->input('colores'))->get();
    }

    public function consultarComentarios($producto_id,$pagina=0){
        $datos =  $this->TiendaProcedure->consultarComentarios($producto_id,$pagina);   
         return  $this->paginacionComentarios($pagina,$datos);
    }

    public function consultarPromedioProductos($producto_id){
        return  $this->TiendaProcedure->consultarPromedioProductos($producto_id);
          
    }

    public function guardarComentarios(Request $request) {
  
        
        $request->validate(
            ['usuario' => 'required|string|max:15|min:3|',
              'comentario' => 'required|string',
              'calificacion' => 'required',   
              'producto' => 'required'

            ]
        );
        try{
            $this->TiendaProcedure->guardarComentario($request->input('usuario'),$request->input('comentario'),$request->input('calificacion'),$request->input('producto'));
            return  $array = array("exito");
        }catch (QueryException $exception){
            $array = array("Error" , $exception->errorInfo[1]);
            return $array;
        }
    }

      public function loadData($pagina = 0) {
            $datos =  $this->SeguridadProcedure->consultarPermisosTodos();
    }

    public function paginacionComentarios($pagina,$datos) {
        $paginacion = 4; // cuantos datos tenemos que recresar por pagina
        $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
        $page = Input::get('page'); // solo es un nombre
        $total = count($datos);
        if($total == 0){
            return "sin datos";
        }
        $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos
        //Echo $total.'-'.$paginacion.'-'.$page;
        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);


        $datos->setPath('blog'); // es una ruta X
        return $datos;

    }

    public function consultarProductosTop(){

        return  $this->TiendaProcedure->consultarProductosTop();
    }

    public function consultarProductosTopVentas(){
        return  $this->TiendaProcedure->consultarProductosTopVentas();
    }

    public function webService() {
        $url = 'https://secure.softwarekey.com/solo/webservices/XmlCustomerService.asmx?WSDL';
        $client = new \SoapClient($url);

        $xmlr = new \SimpleXMLElement("<CustomerSearch></CustomerSearch>");

        $xmlr->addChild('AuthorID', 1);
        $xmlr->addChild('UserID', 'mchojrin');
        $xmlr->addChild('UserPassword', '1234');
        $xmlr->addChild('Email', 'mauro.chojrin@leewayweb.com');

        $params = new \stdClass();

        $params->xml = $xmlr->asXML();

        $result = $client->CustomerSearchS($params);
        echo $result->CustomerSearchSResult->any;
        echo "<br>";
        print_r($result);
        echo PHP_EOL;
    }

    public function validarSesion() {
       $respuesta = \Auth::check();
       if($respuesta === true){
           return 1;
       }else {
           return 0;
       }
    }

    public function iniciarSesion(Request $request){
        // consulta a la base de datos

        $id = \DB::table('user')->where([
            ['email',$request->input('email')],
        ]);
        if(count($id) !== 0 ){
            //dd($request);
            //Se crea variable de request
            $requestConsulta = new Request();
            //Se crea la propiedad email
            $requestConsulta->request->add(array('email' => $request->input('email')));
            $requestConsulta->request->add(array('password' => $request->input('password')));
            //dd($requestConsulta);
            $this->LoginController->login($request);
        }else {
            $url = 'https://secure.softwarekey.com/solo/webservices/XmlCustomerService.asmx?WSDL';
            $client = new \SoapClient($url);

            $xmlr = new \SimpleXMLElement("<CustomerSearch></CustomerSearch>"); // funcion

            $xmlr->addChild('UserPassword',  $request->input('password'));
            $xmlr->addChild('Email', $request->input('email'));

            $params = new \stdClass();

            $params->xml = $xmlr->asXML();

            $result = $client->CustomerSearchS($params);
            echo $result->CustomerSearchSResult->any;
           // comienza a guardar en la base el usuario
            //
            /// / echo "<br>";
            //print_r($result);
            //echo PHP_EOL;


            $this->crearUsuario($request);
            $this->logear($request);
        }

    }

    private function logear(Request $request){
        $this->LoginController->login($request);
    }

    private function crearUsuario(Request $request){
        // crear usuario

        $id =DB::table('users')->insertGetId(
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]
        );

        DB::table('role_user')->insert([
            'role_id' => 3,'user_id' => $id
        ]);
    }

    public function comprar($producto_id) {

        $datos = DB::table('tb_pedido')->where([
           ['user_id',auth()->user()->id],['producto_id',$producto_id],['estado',1]
        ])->get();
        echo count($datos);
        if(count($datos) == 0) {
            // envia los datos al webservice

            // guarda en la base de datos
            return  1;
        }else {
            return 0;
        }



    }
}
