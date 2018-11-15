<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SugerenciaProcedure extends Model
{
    public function guardar($sugerencia,$usuario){
        return  DB::table('sugerencia')->insert(['sugerencia' => $sugerencia, 'usuario' => $usuario]);
}
    public function consultarSugerenciaTodos() {
        return DB::select('CALL spConsultarSugerencia()');
    }

    public function consultarSubCategorias($sugerencia) {
        return DB::select('Call spConsultarSugerencia(?)',array($sugerencia));
    }
     public function  actualizar($id,$nombre,$categoria) {

       return DB::table('sugerencia')
            ->where('id',$id)
            ->update(['sugerencia' => $sugerencia, 'usuario' => $usuario]);

    }

    public function  eliminar($id) {
        return DB::table('sugerencia')->where('id',$id)->update(['estado' => 0]);
    }

    public function  sugerencia() {
        return db::select('call spConsultarSugerencia()');
    }


}


