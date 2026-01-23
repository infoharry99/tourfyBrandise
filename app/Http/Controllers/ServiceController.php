<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /* ================= LIST ================= */
    public function index()
    {
        $services = Service::ordered()->get();
        return view('services.index', compact('services'));
    }

    /* ================= CREATE FORM ================= */
    public function create()
    {
        return view('services.create');
    }

    /* ================= STORE ================= */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:255',
            'status'      => 'required|in:0,1',
            'sort_order'  => 'nullable|integer',
        ]);

        Service::create([
            'title'       => $request->title,
            'description' => $request->description,
            'icon'        => $request->icon,
            'status'      => $request->status,
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service added successfully');
    }

    /* ================= EDIT FORM ================= */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:255',
            'status'      => 'required|in:0,1',
            'sort_order'  => 'nullable|integer',
        ]);

        $service->update([
            'title'       => $request->title,
            'description' => $request->description,
            'icon'        => $request->icon,
            'status'      => $request->status,
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully');
    }

    /* ================= DELETE ================= */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully');
    }
}
