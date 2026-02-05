<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        
        return view('blogs.index', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('blogs'), $imageName);
            $imagePath = 'blogs/'.$imageName;
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => 1,
        ]);

        return back()->with('success', 'Blog added successfully');
    }

   public function show(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            abort(404);
        }

        $blog = Blog::find($id);

        if (!$blog) {
            abort(404);
        }

        return view('blog-details', compact('blog'));
    }



    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }

            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('blogs'), $imageName);
            $data['image'] = 'blogs/'.$imageName;
        }

        $blog->update($data);

        return back()->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }

        $blog->delete();

        return back()->with('success', 'Blog deleted successfully');
    }

    public function toggleStatus(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->is_active = !$blog->is_active;
        $blog->save();

        return response()->json(['status' => true]);
    }
}
