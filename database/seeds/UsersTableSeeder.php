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

        factory(\App\User::class, 1)->state('admin')->create(); // create 1 admin

        factory(\App\User::class, 2)->state('teacher')->create()
            ->each(function (\App\User $teacher){
                $teacher->virtual_class()->saveMany(factory(\App\VirtualClass::class, 3)->make());
            }); // create 3 teachers with 3 classes each

        factory(\App\User::class, 10)->state('student')->create(); // create 10 students


    }
}

/*        DB::table('users')->insert([
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
        DB::table('users')->insert([
            'name' => 'Doris',
            'email' => 'teacher1@gmail.com',
            'role' => 'teacher',
            'password' => Hash::make('password')
        ]);*/

