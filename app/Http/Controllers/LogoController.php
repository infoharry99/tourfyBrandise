<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::latest()->get();
        return view('logos.index', compact('logos'));
    }

    public function create()
    {
        return view('logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/logos'), $name);

                Logo::create([
                    'image' => 'uploads/logos/' . $name
                ]);
            }
        }

        return redirect()->route('admin.logos.index')->with('success', 'Logos uploaded successfully');
    }

    public function edit(Logo $logo)
    {
        return view('logos.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($logo->image && File::exists(public_path($logo->image))) {
                File::delete(public_path($logo->image));
            }

            $name = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logos'), $name);

            $logo->image = 'uploads/logos/' . $name;
        }

        $logo->save();

        return redirect()->route('admin.logos.index')->with('success', 'Logo updated successfully');
    }

    public function destroy(Logo $logo)
    {
        if ($logo->image && File::exists(public_path($logo->image))) {
            File::delete(public_path($logo->image));
        }

        $logo->delete();

        return redirect()->route('admin.logos.index')->with('success', 'Logo deleted successfully');
    }
}
