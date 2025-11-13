<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController 
{
    public function index()
    {
        return view('admin.donation');
    }
}
