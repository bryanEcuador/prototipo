<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
