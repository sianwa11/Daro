<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); // for cleaning earlier data and avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'name' => 'Lugado',
            'email' => 'teacher@gmail.com',
            'role' => 'teacher',
            'password' => Hash::make('password')
        ]);
    }
}
