<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategoriaProcedure extends Model
{
    public function guardar($nombre,$categoria){
        return  DB::table('tb_sub_categoria')->insert(['nombre' => $nombre, 'categoria_id' => $categoria]);
    }

    public function consultarSubCategoriasCategoriasTodos() {
        return DB::select('CALL spConsultarSubCategoriaTodos()');
    }

    public function consultarSubCategorias($nombre) {
        return DB::select('Call spConsultarSubCategoria(?)',array($nombre));
    }

    public function  actualizar($id,$nombre,$categoria) {

       return DB::table('tb_sub_categoria')
            ->where('id',$id)
            ->update(['nombre' => $nombre, 'categoria_id' => $categoria]);

    }

    public function  eliminar($id) {
        return DB::table('tb_sub_categoria')->where('id',$id)->update(['estado' => 0]);
    }

    public function  categorias() {
        return db::select('call spConsultarCategoriasTodos()');
    }


}
