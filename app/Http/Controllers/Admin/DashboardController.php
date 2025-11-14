<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationProgram;

class DashboardController
{
    public function index()
    {
        $data = [
            'donationTotal' => Donation::where('status', 'Sukses')->sum('amount'),
            'donaturTotal' => Donation::where('status', 'Sukses')->count(),
            'donationProgramTotal' => DonationProgram::where('status', 'AKTIF')->count(),
        ];
        return view('admin.dashboard', $data);
    }
}
