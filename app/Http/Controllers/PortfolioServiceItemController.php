<?php

namespace App\Http\Controllers;

use App\Models\PortfolioService;
use App\Models\PortfolioServiceItem;
use Illuminate\Http\Request;

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

        $imagePath = $request->file('image')->store('portfolio/services', 'public');

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
            $data['image'] = $request->file('image')
                ->store('portfolio/services', 'public');
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
