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
        $items = $service->items()->orderBy('sort_order')->get();

        return view('portfolio-service-items.index', compact('service', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'portfolio_service_id' => 'required|exists:portfolio_services,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // $imagePath = $request->file('image')->store('portfolio/services', 'public');
         // Generate unique image name
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

        // Move image to public/portfolio/services
        $request->file('image')->move(
            public_path('portfolio/services'),
            $imageName
        );

        $imagePath = 'portfolio/services/' . $imageName;

        PortfolioServiceItem::create([
            'portfolio_service_id' => $request->portfolio_service_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'sort_order' => PortfolioServiceItem::max('sort_order') + 1,
            'is_active' => 1,
        ]);

        return back()->with('success', 'Item added successfully');
    }

   

    public function update(Request $request, $id)
    {
        $item = PortfolioServiceItem::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {

            // ❌ Delete old image
            if ($item->image && File::exists(public_path($item->image))) {
                File::delete(public_path($item->image));
            }

            // ✅ Save new image in public folder
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('portfolio/services'),
                $imageName
            );

            // Save relative path
            $data['image'] = 'portfolio/services/'.$imageName;
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
