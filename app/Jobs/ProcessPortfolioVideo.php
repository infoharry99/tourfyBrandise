<?php

namespace App\Jobs;

use App\Models\Portfolio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class ProcessPortfolioVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 0; // unlimited
    public $tries = 1;

    protected $portfolio;
    protected $tempPath;

    public function __construct(Portfolio $portfolio, $tempPath)
    {
        $this->portfolio = $portfolio;
        $this->tempPath = $tempPath;
    }

    public function handle()
    {
        // SOURCE FILE
        $sourcePath = storage_path('app/'.$this->tempPath);

        // DESTINATION DIRECTORY
        $destinationDir = public_path('uploads/portfolio/videos');

        // ✅ CREATE DIRECTORY IF NOT EXISTS
        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0777, true, true);
        }

        // FILE NAME
        $fileName = basename($this->tempPath);

        // FINAL DESTINATION PATH
        $destinationPath = $destinationDir.'/'.$fileName;

        // ✅ MOVE FILE
        File::move($sourcePath, $destinationPath);

        // ✅ UPDATE DATABASE
        $this->portfolio->update([
            'media_file' => 'uploads/portfolio/videos/'.$fileName,
            'processing' => 0,
        ]);
    }
}
