<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        public function run()
    {
        factory(App\User::class, 20)->create();

        Role::create([
            'name'      => 'Admin',
            'slug'      => 'slug',
            'special'   => 'all-access'
        ]);
    }
}
public function run()
    {
        Model::unguard();
        $this->call('PostTableSeeder');
    }