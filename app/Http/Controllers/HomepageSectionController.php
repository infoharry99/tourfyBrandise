<?php

namespace App\Http\Controllers;

use App\Models\HomepageSection;
use Illuminate\Http\Request;

class HomepageSectionController extends Controller
{
    public function index()
    {
        // Get first (or only) section
        $section = HomepageSection::first();

        return view('homepage-sections.index', compact('section'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        HomepageSection::updateOrCreate(
            ['id' => $request->id], // if exists → update
            [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ?? 1,
            ]
        );

        return back()->with('success', 'Homepage section saved successfully');
    }
}
