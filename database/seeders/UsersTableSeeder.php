<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'name' => "Mohamed",
            'email' => "mohamed-biljonair@live.nl",
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => "Mark",
            'email' => "mark@gmail.com",
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('12345678'),
            'role' => 'Admin',
        ]);
        
    }
}
