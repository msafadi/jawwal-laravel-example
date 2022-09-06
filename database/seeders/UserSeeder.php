<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query Builder
        DB::table('users')->delete();
        
        DB::table('users')->insert([
            'first_name' => 'Mohammed',
            'last_name'  => 'Safadi',
            'username'   => 'msafadi',
            'email'      => 'm@safadi.ps',
            'password'   => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Ahmed',
            'last_name'  => 'Mohammed',
            'username'   => 'ahmed',
            'email'      => 'a@example.ps',
            'password'   => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
