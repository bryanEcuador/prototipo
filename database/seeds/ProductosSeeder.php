<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            [
                'descripcion' => 'naranja',
                'stock'  => 10,
                'stock_vendido' => 0,
                'precio' => 5.20,
            ],
            [
                'descripcion' => 'tomate',
                'stock'  => 10,
                'stock_vendido' => 0,
                'precio' => 2.20,
            ],
            [
                'descripcion' => 'zanahoria',
                'stock'  => 10,
                'stock_vendido' => 0,
                'precio' => 1.20,
            ],
            [
                'descripcion' => 'cebolla',
                'stock'  => 10,
                'stock_vendido' => 0,
                'precio' => 2.40,
            ]
        ]);
    }
}
