<?php

namespace App\Http\Controllers;

use App\Models\HomepageSectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomepageSectionImageController extends Controller
{
    public function index()
    {
        $images = HomepageSectionImage::orderBy('sort_order')->get();
        return view('homepage-section-images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|mimes:jpg,jpeg,png,webp,avif,gif',
        ]
        );

        if ($request->hasFile('images')) {
            $lastOrder = HomepageSectionImage::max('sort_order') ?? 0;

            foreach ($request->file('images') as $image) {
                $name = time().'_'.uniqid().'.'.$image->extension();
                $image->move(public_path('uploads/homepage'), $name);

                HomepageSectionImage::create([
                    'image_path' => 'uploads/homepage/'.$name,
                    'sort_order' => ++$lastOrder,
                ]);
            }
        }

        return back()->with('success', 'Images uploaded successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sort_order' => 'required|integer|min:0',
        ]);

        $image = HomepageSectionImage::findOrFail($id);

        $newOrder = $request->sort_order;

        // Check if same order already exists
        $existing = HomepageSectionImage::where('sort_order', $newOrder)
            ->where('id', '!=', $id)
            ->first();

        if ($existing) {
            // Swap orders
            $existing->update([
                'sort_order' => $image->sort_order
            ]);
        }

        $image->update([
            'sort_order' => $newOrder
        ]);

        return back()->with('success', 'Sort order updated successfully');
    }


    public function destroy($id)
    {
        $image = HomepageSectionImage::findOrFail($id);

        if ($image->image_path && File::exists(public_path($image->image_path))) {
            File::delete(public_path($image->image_path));
        }

        $image->delete();

        return back()->with('success', 'Image deleted');
    }
}
