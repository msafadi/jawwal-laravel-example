<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admins')->insert();
        Admin::create([
            'name' => 'Mohammed Safadi',
            'username' => 'ms',
            'email' => 'ms@safadi.ps',
            'password' => Hash::make('password'),
        ]);
    }
}
