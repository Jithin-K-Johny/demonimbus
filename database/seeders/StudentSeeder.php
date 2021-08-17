<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'first_name' => 'Jithin',
            'last_name' => 'Johny',
            'email' => 'jithink@gmail.com',
        ]);
        DB::table('students')->insert([
            'first_name' => 'Libin',
            'last_name' => 'Sunny',
            'email' => 'libins@gmail.com',
        ]);
        DB::table('students')->insert([
            'first_name' => 'Martin',
            'last_name' => 'Benny',
            'email' => 'martinm@gmail.com',
        ]);
        DB::table('students')->insert([
            'first_name' => 'Sachin',
            'last_name' => 'Antony',
            'email' => 'sachin@gmail.com',
        ]);
    }
}
