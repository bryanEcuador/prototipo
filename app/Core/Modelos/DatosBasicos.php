<?php

namespace App\Core\Modelos;

use Illuminate\Database\Eloquent\Model;

class DatosBasicos extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'tb_datos_basicos';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';
}
