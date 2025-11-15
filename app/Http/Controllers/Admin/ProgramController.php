<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController
{
    public function index()
    {
        $data = [
            'programs' => DonationProgram::all(),
        ];
        return view('admin.program', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'banner' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'target' => 'required|numeric',
            'description' => 'required'
            // 'status' => 'in:AKTIF,NONAKTIF',
        ]);

        $bannerName = time() . '-' . Str::slug($request->title) . '.' . $request->banner->extension();
        $request->banner->move(public_path('images/program'), $bannerName);

        DonationProgram::create([
            'banner' => 'images/program/' . $bannerName,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'target' => $request->target,
            'status' => 'AKTIF',
            'slug' => Str::slug($request->title . time()),
        ]);

        return back()->with('success', 'Program donasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $program = DonationProgram::findOrFail($id);

        $request->validate([
            // 'banner' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'target' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|in:AKTIF,NONAKTIF',
        ]);

        $bannerPath = $program->banner;

        if ($request->hasFile('banner')) {
            if ($bannerPath && file_exists(public_path($bannerPath))) {
                unlink(public_path($bannerPath));
            }

            $bannerName = time() . '-' . Str::slug($request->title) . '.' . $request->banner->extension();
            $request->banner->move(public_path('images/program'), $bannerName);
            $bannerPath = 'images/program/' . $bannerName;
        }

        $program->update([
            'banner' => $bannerPath,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'target' => $request->target,
            'status' => $request->status,
            'slug' => Str::slug($request->title),
        ]);

        return back()->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $program = DonationProgram::findOrFail($id);

        if ($program->banner && file_exists(public_path($program->banner))) {
            unlink(public_path($program->banner));
        }

        $program->delete();

        return back()->with('success', 'Program berhasil dihapus.');
    }
}
