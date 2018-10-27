<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoriaProcedure extends Model
{
    public function guardar($nombre){
        return  DB::table('tb_categoria')->insert(['nombre' => $nombre]);
    }

    public function consultarCategoriasTodos() {
        return DB::select('CALL spConsultarCategoriasTodos()');
    }

    public function consultarCategorias($nombre) {
        return DB::select('Call spConsultarCategorias(?)',array($nombre));
    }

    public function  actualizar($id,$nombre) {
        return DB::table('tb_categoria')->where('id',$id)->update(['nombre' => $nombre]);

    }

    public function  eliminar($id) {
        return DB::table('tb_categoria')->where('id',$id)->update(['estado' => 0]);
    }

}
