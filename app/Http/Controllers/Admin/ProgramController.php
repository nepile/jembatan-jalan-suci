<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController 
{
    public function index()
    {
        return view('admin.program');
    }
}
