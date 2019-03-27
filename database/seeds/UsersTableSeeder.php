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
            'name' => "Admin",
            'email' => 'admin@test.ru',
            'password' => bcrypt('secret'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => "Manager",
            'email' => 'manager@test.ru',
            'password' => bcrypt('secret'),
            'role' => 'manager',
        ]);
    }
}
