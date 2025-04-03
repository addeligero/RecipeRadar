<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FavoriteController; // Add this import

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('search', function () {
    return Inertia::render('Searched');
})->middleware(['auth', 'verified'])->name('searched');

Route::get('Favorites', function () {
    return Inertia::render('Favorites');
})->middleware(['auth', 'verified'])->name('Myfavorite');

Route::middleware('auth')->group(function () {
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';