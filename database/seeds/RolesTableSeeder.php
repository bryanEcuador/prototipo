<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'administrador',
            'slug' => 'administrador',
            'description' => 'administrador del sistema',
            'special' => null            
        ]);

         Role::create([
            'name' => 'proveedor',
            'slug' => 'proveedor',
            'description' => 'Proveedores de los productos',
            'special' => null            
        ]);

         Role::create([
            'name' => 'comprador',
            'slug' => 'comprador',
            'description' => 'se encarga de realizar compras en la aplicación',
            'special' => null            
        ]);
    }
}
