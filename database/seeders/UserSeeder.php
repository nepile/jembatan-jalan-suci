<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "Superadmin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('123super456'),
            "status" => "Aktif",
            "role" => "SUPERADMIN"
        ]);
    }
}
