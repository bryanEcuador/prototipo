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
            'categoria_id' => 1,
            'nombre' => 'subcategoria'
        ]);
    }
}
