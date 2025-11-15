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
        return view('pages.donation-program');
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
