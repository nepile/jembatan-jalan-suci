<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\DonationProgram;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $data = [
            'programs' => DonationProgram::where('status', 'AKTIF')->limit(3)->get(),
            'galleries' => Gallery::all(),
        ];

        return view('pages.home', $data);
    }
}
