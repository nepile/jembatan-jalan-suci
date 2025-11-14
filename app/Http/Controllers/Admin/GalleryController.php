<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController
{
    public function index() {
        $data = [
            'galleries' => Gallery::all()
        ];
        return view ('admin.gallery', $data);
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'banner' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $bannerName = time() . '.' . $request->banner->extension();
        $request->banner->move(public_path('images/gallery'), $bannerName);
        
        Gallery::create([
            'title' => $request->title,
            'banner' => 'images/gallery/' . $bannerName
        ]);
        
        return back()->with('success', 'Galeri berhasil ditambahkan.');
    } 

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->banner && file_exists(public_path($gallery->banner))) {
            unlink(public_path($gallery->banner));
        }

        $gallery->delete();

        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}
