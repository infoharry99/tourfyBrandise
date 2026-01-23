<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Jobs\ProcessPortfolioVideo;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'media_type' => 'required|in:image,video',
            'media_file' => 'required',
        ]);

        $portfolio = Portfolio::create([
            'title' => $request->title,
            'media_type' => $request->media_type,
            'status' => 1,
            'processing' => 1,
        ]);

        /* ================= VIDEO UPLOAD ================= */
        if ($request->media_type === 'video') {

            // Store in TEMP (supports huge files)
            $tempPath = $request->file('media_file')
                                ->storeAs('temp/videos', uniqid().'.mp4');

            ProcessPortfolioVideo::dispatch($portfolio, $tempPath);

            return redirect()->route('portfolios.index')
                ->with('success','Video upload started in background');
        }

        /* ================= IMAGE UPLOAD ================= */
        $imageName = time().'.'.$request->media_file->extension();
        $request->media_file->move(
            public_path('uploads/portfolio/images'),
            $imageName
        );

        $portfolio->update([
            'media_file' => 'uploads/portfolio/images/'.$imageName,
            'processing' => 0,
        ]);

        return redirect()->route('portfolios.index')
            ->with('success','Portfolio added successfully');
    }

    /* ================= EDIT ================= */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolio.edit', compact('portfolio'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $portfolio->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.portfolios.index')
            ->with('success','Portfolio updated successfully');
    }

    /* ================= DELETE ================= */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->media_file && File::exists(public_path($portfolio->media_file))) {
            File::delete(public_path($portfolio->media_file));
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success','Portfolio deleted successfully');
    }
}
