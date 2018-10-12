<?php

use Illuminate\Database\Seeder;

class ColoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_colores')->insert([
           'nombre' => 'negro',
            'hexadecimal' => '#000000',
            'descripcion' => 'black'
        ],
        [
            'nombre' => 'rojo',
            'hexadecimal' => '#F10101',
            'descripcion' => 'red'
        ],
        [
            'nombre' => 'azul',
            'hexadecimal' => '#0155F1',
            'descripcion' => 'blue'
        ]
        );
    }
}
