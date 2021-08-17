<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jithin',
            'email' => 'jithin@gmail.com',
            'password' => 'jithin@123'
        ]);
        DB::table('users')->insert([
            'name' => 'Libin',
            'email' => 'libin@gmail.com',
            'password' => 'libin@123'
        ]);
    }
}
