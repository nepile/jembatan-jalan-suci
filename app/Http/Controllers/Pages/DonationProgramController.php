<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\DonationProgram;
use Illuminate\Http\Request;

class DonationProgramController
{
    public function index()
    {
        $data = [
            'donationTotal' => Donation::where('status', 'Sukses')->sum('amount'),
            'donaturTotal' => Donation::where('status', 'Sukses')->count(),
            'donationProgramTotal' => DonationProgram::where('status', 'AKTIF')->count(),
            'programs' => DonationProgram::where('status', 'AKTIF')->limit(3)->get(),
        ];
        return view('pages.donation-program', $data);
    }

    public function showDonationDetail($slug)
    {
        $programData = DonationProgram::where('slug', $slug)->first();
        $data = [
            'program' => DonationProgram::with('donation')->where('slug', $slug)->first(),
            'donaturs' => Donation::where('status', 'Sukses')->where('program_id', $programData->program_id)->orderBy('created_at', 'DESC')->get(),
        ];

        return view('pages.donation-detail', $data);
    }
}
