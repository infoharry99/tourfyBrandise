<?php

namespace App\Http\Controllers;

use App\Models\PortfolioService;
use App\Models\PortfolioServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioServiceItemController extends Controller
{
    public function index($serviceId)
    {
        $service = PortfolioService::findOrFail($serviceId);
        $items = $service->items()->orderBy('id', 'desc')->get();

        return view('portfolio-service-items.index', compact('service', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'portfolio_service_id' => 'required|exists:portfolio_services,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB image
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:10240', // ✅ 10MB video
            'visit_url' => 'nullable|url',
        ], [
            'video.max' => 'Video size must not exceed 10 MB.',
        ]);

        $imagePath = null;
        $videoPath = null;

        /** IMAGE UPLOAD */
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                public_path('portfolio/services'),
                $imageName
            );

            $imagePath = 'portfolio/services/' . $imageName;
        }

        /** VIDEO UPLOAD */
        if ($request->hasFile('video')) {
            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(
                public_path('portfolio/services'),
                $videoName
            );

            $videoPath = 'portfolio/services/' . $videoName;
        }

        PortfolioServiceItem::create([
            'portfolio_service_id' => $request->portfolio_service_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
            'sort_order' => PortfolioServiceItem::max('sort_order') + 1,
            'is_active' => 1,
        ]);

        return back()->with('success', 'Item added successfully');
    }


    public function update(Request $request, $id)
    {
        $item = PortfolioServiceItem::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:10240', // 10MB
            'visit_url' => 'nullable|url',
        ], [
            'video.max' => 'Video size must not exceed 10 MB.',
        ]);

       

        $data = $request->only(['title', 'description', 'visit_url']);

        /** IMAGE UPDATE */
        if ($request->hasFile('image')) {

            // Delete old image
            if ($item->image && File::exists(public_path($item->image))) {
                File::delete(public_path($item->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                public_path('portfolio/services'),
                $imageName
            );

            $data['image'] = 'portfolio/services/' . $imageName;
        }

        /** VIDEO UPDATE */
        if ($request->hasFile('video')) {

            // Delete old video
            if ($item->video && File::exists(public_path($item->video))) {
                File::delete(public_path($item->video));
            }

            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(
                public_path('portfolio/services'),
                $videoName
            );

            $data['video'] = 'portfolio/services/' . $videoName;
        }

        $item->update($data);

        return back()->with('success', 'Item updated successfully');
    }



    public function destroy($id)
    {
        PortfolioServiceItem::findOrFail($id)->delete();
        return back()->with('success', 'Item deleted successfully');
    }

    public function updateStatus(Request $request)
    {
        $item = PortfolioServiceItem::findOrFail($request->id);
        $item->is_active = !$item->is_active;
        $item->save();

        return response()->json(['status' => true]);
    }
}
