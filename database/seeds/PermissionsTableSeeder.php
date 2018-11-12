<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'pruebac', 'slug' => 'pruebac','description'=> 'Editar'],
            ['name' => 'pruebad', 'slug' => 'pruebad','description'=> 'Editar'],
            ['name' => 'pruebae', 'slug' => 'pruebae','description'=> 'Editar'],
            ['name' => 'pruebaf', 'slug' => 'pruebaf','description'=> 'Editar'],
            ['name' => 'pruebag', 'slug' => 'pruebag','description'=> 'Editar'],
            ['name' => 'pruebah', 'slug' => 'pruebah','description'=> 'Editar'],
            ['name' => 'pruebai', 'slug' => 'pruebai','description'=> 'Editar'],
            ['name' => 'pruebaj', 'slug' => 'pruebaj','description'=> 'Editar'],
            ['name' => 'pruebak', 'slug' => 'pruebak','description'=> 'Editar'],
            ['name' => 'pruebal', 'slug' => 'pruebal','description'=> 'Editar']
        ]);
    }
}
