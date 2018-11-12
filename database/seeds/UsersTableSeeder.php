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
            [
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'BRYAN',
                'email' => 'bryansilva021'.'@hotmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'PEDRO',
                'email' => 'pedro'.'@hotmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'JUAN',
                'email' => 'juan'.'@hotmail.com',
                'password' => bcrypt('12345678'),
            ],
        ]);

    }
}
