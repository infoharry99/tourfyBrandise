<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    /* ===== LIST ===== */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('banners.index', compact('banners'));
    }

    /* ===== CREATE FORM ===== */
    public function create()
    {
        return view('banners.create');
    }

    /* ===== STORE ===== */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'link' => 'nullable|url',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/banners'), $imageName);

        $banner=Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/banners/'.$imageName,
            'link' => $request->link,
            'status' => $request->status ?? 1,
        ]);

       

        return redirect()->route('admin.banners.index')->with('success','Banner added successfully');
    }

    /* ===== EDIT FORM ===== */
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /* ===== UPDATE ===== */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($banner->image))) {
                File::delete(public_path($banner->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imageName);
            $banner->image = 'uploads/banners/'.$imageName;
        }

        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'status' => $request->status ?? $banner->status,
        ]);

        return redirect()->route('admin.banners.index')->with('success','Banner updated');
    }

    /* ===== DELETE ===== */
    public function destroy(Banner $banner)
    {
        if (File::exists(public_path($banner->image))) {
            File::delete(public_path($banner->image));
        }

        $banner->delete();
        return back()->with('success','Banner deleted');
    }
}
