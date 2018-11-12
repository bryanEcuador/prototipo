<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_marca')->insert([
            ['nombre' => 'NIKE'],
            ['nombre' => 'APPLE'],
            ['nombre' => 'SAMSUNG'],
            ['nombre' => 'SONY'],
            ['nombre' => 'TOSHIBA'],
            ['nombre' => 'IBM'],
            ['nombre' => 'QRG'],
            ['nombre' => 'LINKEN'],
            ['nombre' => 'DUREX'],
            ['nombre' => 'SANDER'],
            ['nombre' => 'SPLUT'],
        ]);
    }
}
