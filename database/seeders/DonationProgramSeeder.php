<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donation_programs')->insert([
            'banner' => 'donasi1.png',
            'title' => 'Donasi Bencana Alam',
            'description' => 'iya ini donasi',
            'deadline' => date('Y-m-d', strtotime('now')),
            'target' => 2000000,
            'slug' => 'donasi-bencana-alam-12019', 
            'status' => 'AKTIF'
        ]);
    }
}
