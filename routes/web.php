<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MyFavoritesController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('search', function () {
    return Inertia::render('Searched');
})->middleware(['auth', 'verified'])->name('searched');

//  Favorites route with data rendering
// Show favorites
Route::get('/favorites', [MyFavoritesController::class, 'index'])  // lowercase
    ->middleware(['auth', 'verified']);


// Store a new favorite
Route::post('/favorites', [MyFavoritesController::class, 'store'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
