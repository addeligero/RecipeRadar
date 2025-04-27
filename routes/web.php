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


Route::get('/favorites', [MyFavoritesController::class, 'index'])  // lowercase
    ->middleware(['auth', 'verified']);


// Store a new favorite
Route::post('/favorites', [MyFavoritesController::class, 'store'])
    ->middleware(['auth', 'verified']);

//para delete
Route::delete('/favorites/{id}', [MyFavoritesController::class, 'destroy'])->middleware(['auth']);

Route::get('about', function () {
    return Inertia::render('About');
})->middleware(['auth', 'verified']);


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
