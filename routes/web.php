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
use App\Http\Controllers\PortfolioServiceController;
use App\Http\Controllers\PortfolioServiceItemController;
use App\Http\Controllers\ServiceController;
use App\Models\Banner;
use App\Models\PortfolioService;
use Illuminate\Support\Facades\Artisan;

Route::get('/run', function () {
    Artisan::call('storage:link');

    return 'Storage link created successfully';
});

Route::resource('banners', BannerController::class);
// middleware(['auth'])->
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('banners', BannerController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('portfolios', PortfolioController::class);


    Route::resource('abouts', AboutController::class);

    Route::get('/portfolio-services', [PortfolioServiceController::class, 'index'])
        ->name('portfolio-services.index');

    Route::post('/portfolio-services/store', [PortfolioServiceController::class, 'store'])
        ->name('portfolio-services.store');

    Route::post('/portfolio-services/update/{id}', [PortfolioServiceController::class, 'update'])
        ->name('portfolio-services.update');

    Route::delete('/portfolio-services/delete/{id}', [PortfolioServiceController::class, 'destroy'])
        ->name('portfolio-services.destroy');

    Route::post('/portfolio-services/update-status', [PortfolioServiceController::class, 'updateStatus'])
        ->name('portfolio-services.update-status');


    Route::get('/portfolio-services/{service}/items', 
        [PortfolioServiceItemController::class, 'index'])
        ->name('portfolio-service-items.index');

    Route::post('/portfolio-service-items/store', 
        [PortfolioServiceItemController::class, 'store'])
        ->name('portfolio-service-items.store');

    Route::post('/portfolio-service-items/update/{id}', 
        [PortfolioServiceItemController::class, 'update'])
        ->name('portfolio-service-items.update');

    Route::delete('/portfolio-service-items/delete/{id}', 
        [PortfolioServiceItemController::class, 'destroy'])
        ->name('portfolio-service-items.destroy');

    Route::post('/portfolio-service-items/update-status', 
        [PortfolioServiceItemController::class, 'updateStatus'])
        ->name('portfolio-service-items.update-status');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Route::get('/portfolio', function () {
//     return view('portfolio');
// });


Route::get('/portfolio', [PortfolioServiceController::class, 'portfolioServices'])
        ->name('portfolio-services.index');

Route::get('/slider', function () {
    return view('slider');
});

Route::get('/', function () {
    
    $banners = Banner::where('status', 1)
        ->latest()
        ->get();
    $services = PortfolioService::with([
            'items' => function ($q) {
                $q->where('is_active', 1)->orderBy('sort_order');
            }
        ])
        ->where('is_active', 1)
        ->orderBy('sort_order')
        ->get();

    return view('welcome',compact('banners','services'));
});
   
