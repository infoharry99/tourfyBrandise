<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $name);
            $imagePath = 'uploads/testimonials/'.$name;
        }

        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'rating' => $request->rating,
            'review' => $request->review,
            'image_path' => $imagePath,
            'status' => 1,
        ]);

        return back()->with('success', 'Testimonial added successfully');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image_path && File::exists(public_path($testimonial->image_path))) {
                File::delete(public_path($testimonial->image_path));
            }

            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $name);
            $testimonial->image_path = 'uploads/testimonials/'.$name;
        }

        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image_path && File::exists(public_path($testimonial->image_path))) {
            File::delete(public_path($testimonial->image_path));
        }

        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted successfully');
    }

    
}
