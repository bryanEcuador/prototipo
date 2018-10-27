<?php

namespace App\Core\Procedimientos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ConfiguracionProcedure extends Model
{
    public function guadarDatosPagina($nombre,$email,$telefono,$direccion,$descripcion,$terminos,$politica,$acerca,$ordenes) {
        DB::table('tb_datos_basicos')
            ->where('id',1)
            ->update([

                'nombre' => $nombre,
                'email' => $email,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'descripcion' => $descripcion,
                'terminos' => $terminos,
                'politica' => $politica,
                'acerca' => $acerca,
                'ordenes' => $ordenes ,
                //'logo' => 'logo.png'
            ]);
    }

}
