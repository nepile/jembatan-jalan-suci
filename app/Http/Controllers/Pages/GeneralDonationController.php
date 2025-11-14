<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralDonationController extends Controller
{
    public function index()
    {
        return view('pages.general-donation');
    }
}
