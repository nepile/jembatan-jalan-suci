<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\DonationProgram;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $data = [
            'programs' => DonationProgram::where('status', 'AKTIF')->limit(3)->get(),
        ];

        return view('pages.home', $data);
    }
}
