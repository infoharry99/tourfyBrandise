<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/* ---------- AUTH ROUTES ---------- */
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Models\Banner;

Route::resource('banners', BannerController::class);
// middleware(['auth'])->
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('banners', BannerController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('portfolios', PortfolioController::class);


    Route::resource('abouts', AboutController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/slider', function () {
    return view('slider');
});

Route::get('/', function () {
    
    $banners = Banner::where('status', 1)
        ->latest()
        ->get();
    return view('welcome',compact('banners'));
});
   
