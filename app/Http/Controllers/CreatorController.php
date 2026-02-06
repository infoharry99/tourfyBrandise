<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CreatorController extends Controller
{
    public function userindex()
    {
        $creators = Creator::where('status', 1)->latest()->get();
        return view('creator', compact('creators'));
    }
    public function index()
    {
        $creators = Creator::latest()->get();
        return view('creators.index', compact('creators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif,gif|max:2048',
            'drive_link' => 'nullable|url',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/creators'), $name);
            $imagePath = 'uploads/creators/'.$name;
        }

        Creator::create([
            'image_path' => $imagePath,
            'drive_link' => $request->drive_link,
            'status' => 1,
        ]);

        return back()->with('success', 'Creator added successfully');
    }

    public function update(Request $request, $id)
    {
        $creator = Creator::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif,gif|max:2048',
            'drive_link' => 'nullable|url',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($creator->image_path && File::exists(public_path($creator->image_path))) {
                File::delete(public_path($creator->image_path));
            }

            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/creators'), $name);
            $creator->image_path = 'uploads/creators/'.$name;
        }

        $creator->update([
            'drive_link' => $request->drive_link,
            'status' => $request->status ?? $creator->status,
        ]);

        return back()->with('success', 'Creator updated successfully');
    }

    public function destroy($id)
    {
        $creator = Creator::findOrFail($id);

        if ($creator->image_path && File::exists(public_path($creator->image_path))) {
            File::delete(public_path($creator->image_path));
        }

        $creator->delete();

        return back()->with('success', 'Creator deleted successfully');
    }
}
