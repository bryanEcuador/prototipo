<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TiendaProcedure extends Model
{
    public function consultarComentarios($producto) {
        return DB::select('Call spConsultarComentario(?)',array($producto));
        return DB::select('Call spConsultarComentario(?)',array($producto));
    }

      public function consultarPromedioProductos($producto){
        return DB::select('Call promedioProductos(?)',array($producto));   
    }

    public function guardarComentario($usuario,$comentario,$calificacion,$producto) {
         DB::table('comments')->insert([
            'comentario'    => $comentario,
            'usuario'       => $usuario,
            'calificacion'  => $calificacion,
            'producto'      => $producto,
            'estado'        => 1

            ]);
    }

    public function consultarProductosTop(){
        return DB::select('Call spConsultarProductosTop()');
    }

    public function consultarProductosTopVentas(){
        return DB::select('Call spConsultarProductosMasVendidos()');
    }
}
