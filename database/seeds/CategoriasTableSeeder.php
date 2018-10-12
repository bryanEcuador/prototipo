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
            'nombre' => 'categoria1'
        ],
            [
                'nombre' => 'categoria2'
            ]);
    }
}
