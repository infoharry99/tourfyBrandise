<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /* ===== LIST ===== */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('about.index', compact('abouts'));
    }

    /* ===== CREATE FORM ===== */
    public function create()
    {
        return view('about.create');
    }

    /* ===== STORE ===== */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
            $imagePath = 'uploads/about/'.$imageName;
        }

        About::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'status'      => $request->status ?? 1,
        ]);

        return redirect()->route('admin.abouts.index')
                         ->with('success','About content added successfully');
    }

    /* ===== EDIT FORM ===== */
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    /* ===== UPDATE ===== */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($about->image && File::exists(public_path($about->image))) {
                File::delete(public_path($about->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about'), $imageName);
            $about->image = 'uploads/about/'.$imageName;
        }

        $about->update([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status ?? $about->status,
        ]);

        return redirect()->route('admin.abouts.index')
                         ->with('success','About content updated successfully');
    }

    /* ===== DELETE ===== */
    public function destroy(About $about)
    {
        if ($about->image && File::exists(public_path($about->image))) {
            File::delete(public_path($about->image));
        }

        $about->delete();

        return back()->with('success','About content deleted');
    }
}
