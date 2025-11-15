<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('pages.gallery', compact('galleries'));
    }
}
