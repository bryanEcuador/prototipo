<?php
        
namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeguridadProcedure extends Model
{
    public function permisos (){
       return DB::table('permissions')->get();   
    }

    public function storePermisos($name,$slug,$description,$fecha) {
        return DB::table('permissions')->insertGetId(
                [   'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'created_at' => $fecha,
                    'updated_at' => $fecha                ]
            );
    }

     public function updatePermisos($id,$name,$slug,$description,$fecha) {
       
        return  DB::table('permissions')->where('id',$id)
                    ->update([ 'name' => $name,
                        'slug' => $slug,
                        'description' => $description,
                        'updated_at' =>$fecha
                    ]);
    }


     public function showPermisos($id) {
        return DB::table('permissions')->where('id',$id)->get();
    }

    public function consultarPermiso($nombre = '') {
          return \DB::select('call spConsultarPermisosNombre(?)',array($nombre));
    }

    public function consultarPermisosTodos() {
       return \DB::select('call spConsultarPermisostodos');
 
    }
     
}
