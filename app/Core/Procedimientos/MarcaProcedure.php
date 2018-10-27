<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MarcaProcedure extends Model
{
    public function guardar($nombre){
        return  DB::table('tb_marca')->insert(['nombre' => $nombre]);
    }

    public function consultarMarcasTodos() {
        return DB::select(DB::raw('CALL prototipo.spConsultarMarcasTodos()'));
    }

    public function consultarMarcas($nombre) {
        return DB::select('Call spConsultarMarcas(?)',array($nombre));
    }

    public function  actualizar($id,$nombre) {
        return DB::table('tb_marca')->where('id',$id)->update(['nombre' => $nombre]);

    }

    public function  eliminar($id) {
        return DB::table('tb_marca')->where('id',$id)->update(['estado' => 0]);
    }


}
