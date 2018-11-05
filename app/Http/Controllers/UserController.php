<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\Procedimientos\SeguridadProcedure;

class UserController extends Controller
{
    //parte de la logica esta en Auth/RegisterController

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $SeguridadProcedure;

    public function __construct(SeguridadProcedure $seguridadProcedure){
        $this->SeguridadProcedure = $seguridadProcedure;
    }

    public function index()
    {
        return view('modulos.seguridad.usuarios');
    }

     public function loadData($pagination,$pagina = 0,$rol = 0,$nombre = null) {

        if($nombre == null && $rol == 0) {
                $datos =  $this->SeguridadProcedure->consultarUsuariosTodos();
                return $this->paginacion($pagina,$datos,$pagination);

        } else {
            return $this->search($nombre,$pagina,$pagination,$rol);

        }

    }
    public function search($nombre,$pagina = 0,$pagination,$rol) {

        $datos = $this->SeguridadProcedure->consultarUsuario($nombre,$rol);
        return  $this->paginacion($pagina,$datos,$pagination);
    }

    public function paginacion($pagina,$datos,$pagination) {
            if(count($datos) === 0){
                return 0;
            }
            $paginacion = $pagination; // cuantos datos tenemos que recresar por pagina
            $pagina != 0 ? $pagina = ($pagina - 1) * $paginacion : $pagina  = 0; // se hace el calculo de los resultados quqe debe devolver
            $page = Input::get('page'); // solo es un nombre
            $total = count($datos);
                if($total <=5 ){
                    return $datos;
                }
            $datos = array_slice($datos, $pagina , $paginacion); // 1: datos , 2: desde que posicion  , 3: cuantos datos


        $datos = new LengthAwarePaginator($datos, $total, $paginacion, $page);
            $datos->setPath('blog'); // es una ruta X
             return $datos;


    }

     public function cmbRoles()
    {
         return \DB::table('roles')->get();
    }

    public function validarUsuario($dato,$tipo,$metodo,$id = 0) {

        return $this->SeguridadProcedure->validarUsuario($dato,$tipo,$metodo,$id);
    }

    public function store(Request $request)
    {

         $request->validate([
            'nombres' => 'required|max:30',
            'apellidos' => 'required',
            'name'=> 'required|unique:users|max:10',
            'password' => 'required|min:8|max:16',
            'rol' => 'required'
        ]);
        //
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $name = $request->input('name');
        $estado = 1;
        $rol = $request->input('rol');
        $password = bcrypt($request->input('pass')) ;

        $id =DB::table('users')->insertGetId(
            ['nombres' => $nombres,
                'apellidos' => $apellidos,
                'name' => $name,
                'estado' => $estado,
                'password' => $password,
                'remember_token' => str_random(60),
                'created_at' => null,
                'updated_at' => null]
        );

        DB::table('role_user')->insert([
            'role_id' => $rol,'user_id' => $id
            ]);
         User::create($request->input());
        return response()->json(['success'=>'Informacion guardada con exito']);

    }

    public function show($id)
    {
        //
       return $this->SeguridadProcedure->usuariosShow($id);  
    
    }

    public function fechaActual() {
        date_default_timezone_set('America/Lima');
        $year = date('Y');
        $mes = date('m');
        $dia = date('d');
        $hora= date('H') ;
        $minutos = date('i');
        $segundos = date('s');

        return $year.'-'.$mes.'-'.$dia.' '.$hora .':'.$minutos.':'.$segundos.'';
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|max:30',
            'rol'=> 'required',
            'email' => 'required|email',
        ],[
            'name.required' => 'El nombre de usuarios es requerido',
            'email.required' => 'El email es requeridos',
            'rol.required' => 'El rol es requerido',

        ]);

        $name = $request->input('name');
        $rol = $request->input('rol');
        $password = $request->input('password') ;
        $email = $request->input('email') ;
        $fecha_modficacion = $this->fechaActual();
        $id = $request->input('id');      

        try{
            $this->SeguridadProcedure->usuarioUpdate($name,$rol,$password,$email,$fecha_modficacion,$id);
        }catch (QueryException $e){
            //$array = array("Error" , $e->errorInfo[1]);
            return $e; //array;
        }



    }

    public function destroy($id)
    {
       try {
            $this->SeguridadProcedure->usuariosDelete($id);
      }catch (QueryException $e){
            //$array = array("Error" , $e->errorInfo[1]);
            return $e; //array;
        }
    }

    /*  */
    public function usuario($user){
        $resultado = DB::table('users')->select('id')->where('name',$user)->get();
        $resultado = (object) $resultado;
        if(isset($resultado[0]->id))
        {
            return 0;
        }else {
            return 1;
        }
    }



    public function consularUsuarioName($rol=0,$usuario='')
    {
        return \DB::select('call spconsultarUsuariosName(?,?)',array($usuario,$rol));
    }
}
