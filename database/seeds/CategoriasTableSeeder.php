<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_categoria')->insert([
            ['nombre' => 'TELEFONOS'],
            ['nombre' => 'ROPA'],
            ['nombre' => 'ELECTRODOMESTICOS'],
            ['nombre' => 'COMPUTADORAS'],
            ['nombre' => 'TECNOLOGIA'],
            ['nombre' => 'MUEBLES'],
            ['nombre' => 'LENTES'],
            ['nombre' => 'HOGAR'],
            ['nombre' => 'VARIOS'],
            ['nombre' => 'BEBE'],
            ['nombre' => 'CONSTRUCCION'],
        ]);
    }
}
