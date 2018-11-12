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
            //UsersTableSeeder::class,
            //DatosBasicosTableSeeder::class,
            //ColoresTableSeeder::class,
            //MarcasTableSeeder::class,
            //CategoriasTableSeeder::class,
            //SubCategoriasTableSeeder::class,
            //PermissionsTableSeeder::class,
            //RolesTableSeeder::class,
            //CommentsTableSeeder::class,
            
        ]);
    }
}
