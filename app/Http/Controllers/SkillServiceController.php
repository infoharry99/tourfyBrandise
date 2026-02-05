<?php

namespace App\Http\Controllers;

use App\Models\SkillService;
use App\Models\ServiceFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillServiceController extends Controller
{
    public function index()
    {
        $services = SkillService::with('features')->latest()->get();
        return view('skill-services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features.*' => 'nullable|string|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/services'), $name);
            $imagePath = 'uploads/services/'.$name;
        }

        $service = SkillService::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        if ($request->features) {
            foreach ($request->features as $feature) {
                if ($feature) {
                    ServiceFeature::create([
                        'service_id' => $service->id,
                        'feature' => $feature,
                    ]);
                }
            }
        }

        return back()->with('success', 'Service added successfully');
    }

    public function update(Request $request, $id)
    {
        $service = SkillService::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && File::exists(public_path($service->image))) {
                File::delete(public_path($service->image));
            }

            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/services'), $name);
            $service->image = 'uploads/services/'.$name;
        }

        $service->update([
            'title' => $request->title,
        ]);

        return back()->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = SkillService::findOrFail($id);

        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }

        $service->delete();

        return back()->with('success', 'Service deleted successfully');
    }

    public function deleteFeature($id)
    {
        ServiceFeature::findOrFail($id)->delete();
        return back()->with('success', 'Feature removed');
    }
}
