<?php

use Illuminate\Database\Seeder;

class permission_roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            ['role_id' => 3, 'user_id' => 1 ],
            ['role_id' => 3, 'user_id' => 2],
            ['role_id' => 3, 'user_id' => 3 ],
            ['role_id' => 3, 'user_id' => 4 ],
            ['role_id' => 3, 'user_id' => 5 ],
            ['role_id' => 3, 'user_id' => 6 ],
            ['role_id' => 3, 'user_id' => 7 ],
            ['role_id' => 3, 'user_id' => 8 ],
            ['role_id' => 3, 'user_id' => 9 ],
            ['role_id' => 3, 'user_id' => 10 ],
            ['role_id' => 1, 'user_id' => 11 ],
            ['role_id' => 2, 'user_id' => 12 ],
            ['role_id' => 2, 'user_id' => 13 ],
        ]);
    }
}
