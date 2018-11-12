<?php

use Illuminate\Database\Seeder;

class SubCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_sub_categoria')->insert([
            ['categoria_id' => 1, 'nombre' => 'FIJOS'] ,
            ['categoria_id' => 1, 'nombre' => 'SMARTFHONE'] ,
            ['categoria_id' => 2, 'nombre' => 'PANTALONES'] ,
            ['categoria_id' => 2, 'nombre' => 'CAMISAS'] ,
            ['categoria_id' => 2, 'nombre' => 'ROPA INTERIOR'] ,
            ['categoria_id' => 3, 'nombre' => 'LINEA BALNCA'] ,
            ['categoria_id' => 4, 'nombre' => 'ESCRITORIO'] ,
            ['categoria_id' => 4, 'nombre' => 'LAPTOS'] ,
            ['categoria_id' => 4, 'nombre' => 'GAMER'] ,
            ['categoria_id' => 5, 'nombre' => 'SMARTWATCH'] ,
            ['categoria_id' => 5, 'nombre' => 'TABLETS'] ,
        ]);
    }
}
