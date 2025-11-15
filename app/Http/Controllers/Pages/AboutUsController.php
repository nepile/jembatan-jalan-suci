<?php

namespace App\Http\Controllers\Pages;

use App\Models\Donation;

class AboutUsController
{
    public function index()
    {
        $totalDonatur = Donation::where('status', 'Sukses')->count();
        return view('pages.about-us', compact('totalDonatur'));
    }
}
    //
