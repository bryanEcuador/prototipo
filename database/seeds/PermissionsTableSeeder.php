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
        Permission::create([
            'name'           => 'navegar administrador',
            'slug'           => 'administrador.index',
            'description'    => 'navegar por el menu del administrador',
                        
        ]);
        
        Permission::create([
            'name'           => 'navegar proveedor',
            'slug'           => 'proveedor.index',
            'description'    => 'navegar por el menu del proveedor',
                        
        ]);
    }
}
