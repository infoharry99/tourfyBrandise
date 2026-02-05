<?php

namespace App\Http\Controllers;

use App\Models\PortfolioService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioServiceController extends Controller
{
    public function portfolioServices()
    {
        $services = PortfolioService::with([
            'items' => function ($q) {
                $q->where('is_active', 1)->orderBy('id', 'desc');
            }
        ])
        ->where('is_active', 1)
        ->orderBy('sort_order')
        ->get();

        return view('portfolio', compact('services'));
    }


    public function index()
    {
        $services = PortfolioService::orderBy('sort_order')->get();
        return view('portfolio-services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        PortfolioService::create([
            'service_name' => $request->service_name,
            'slug' => Str::slug($request->service_name),
            'sort_order' => PortfolioService::max('sort_order') + 1,
            'is_active' => 1,
        ]);

        return redirect()->back()->with('success', 'Service added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $service = PortfolioService::findOrFail($id);

        $service->update([
            'service_name' => $request->service_name,
            'slug' => Str::slug($request->service_name),
        ]);

        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        PortfolioService::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Service deleted successfully');
    }

    public function updateStatus(Request $request)
    {
        $service = PortfolioService::findOrFail($request->id);
        $service->is_active = !$service->is_active;
        $service->save();

        return response()->json([
            'status' => true,
            'is_active' => $service->is_active,
        ]);
    }
}
