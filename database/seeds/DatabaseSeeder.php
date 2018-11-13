<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            permission_roleTableSeeder::class,
            MarcasTableSeeder::class,
            CategoriasTableSeeder::class,
            SubCategoriasTableSeeder::class,
            //DatosBasicosTableSeeder::class,
            //ColoresTableSeeder::class,



            //CommentsTableSeeder::class,

            
        ]);
    }
}
