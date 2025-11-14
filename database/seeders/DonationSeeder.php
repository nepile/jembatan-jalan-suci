<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;
use Illuminate\Support\Str;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Sukses',
            'Menunggu',
            'Gagal',
            'Kadaluarsa',
            'Dibatalkan'
        ];

        foreach ($statuses as $status) {
            Donation::create([
                'donation_id'            => Str::uuid(),
                'order_id'      => "DONASI-".time(),
                'full_name'     => fake()->name(),
                'honorary_call' => fake()->title(),
                'email'         => fake()->email(),
                'phone_number'  => fake()->phoneNumber(),
                'hope'          => fake()->sentence(),
                'bank'          => fake()->randomElement(['BCA', 'Mandiri', 'BRI', 'BNI']),
                'amount'        => fake()->numberBetween(10000, 500000),
                'status'        => $status,
                'program_id'    => "a672b932-db7d-476d-95b3-4ef68127965b"
            ]);
        }
    }
}
