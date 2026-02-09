<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest()->get();
        return view('team-members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,webp,avif|max:2048',
            'x_url' => 'nullable|url',
            'fb_url' => 'nullable|url',
            'insta_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/team'), $name);
            $imagePath = 'uploads/team/'.$name;
        }

        TeamMember::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image_path' => $imagePath,
            'x_url' => $request->x_url,
            'fb_url' => $request->fb_url,
            'insta_url' => $request->insta_url,
            'linkedin_url' => $request->linkedin_url,
            'status' => 1,
        ]);

        return back()->with('success', 'Team member added successfully');
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,avif|max:2048',
            'x_url' => 'nullable|url',
            'fb_url' => 'nullable|url',
            'insta_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($member->image_path && File::exists(public_path($member->image_path))) {
                File::delete(public_path($member->image_path));
            }

            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/team'), $name);
            $member->image_path = 'uploads/team/'.$name;
        }

        $member->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'x_url' => $request->x_url,
            'fb_url' => $request->fb_url,
            'insta_url' => $request->insta_url,
            'linkedin_url' => $request->linkedin_url,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Team member updated successfully');
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);

        if ($member->image_path && File::exists(public_path($member->image_path))) {
            File::delete(public_path($member->image_path));
        }

        $member->delete();

        return back()->with('success', 'Team member deleted');
    }
}
