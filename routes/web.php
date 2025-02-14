<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    return redirect()->route('products.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    // set dead stock
    Route::put('products/{id}/dead-stock', [ProductController::class, 'deadStock'])->name('products.dead-stock');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('product_logs', ProductLogController::class)->only(['index', 'create', 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('teams', TeamController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('campaigns', CampaignController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::put('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

    Route::resource('social_medias', SocialMediaController::class);
});

require __DIR__.'/auth.php';
