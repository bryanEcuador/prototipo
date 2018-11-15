<?php

use Illuminate\Database\Seeder;

class DatosBasicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_datos_basicos')->insert([
            'nombre' => 'empresa',
            'descripcion' => 'empresa de venta de prodcutos...',
            'email' => 'empresa@gmail.com',
            'telefono' => 'empresa@gmail.com',
            'direccion' => 'dirección empresa',
            'terminos' => 'terminos',
            'acerca' => 'acerca',
            'logo' => 'logo',
            'politica' => 'condiciones',
            'ordenes' => 'politica de ordenes',
        ]);
    }
}
