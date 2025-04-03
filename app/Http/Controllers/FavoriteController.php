<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'meal_id' => 'required|string',
            'meal_data' => 'required|array',
            'is_favorite' => 'required|boolean',
        ]);

        $user = Auth::user();

        if ($request->is_favorite) {
            $user->favorites()->updateOrCreate(
                ['meal_id' => $request->meal_id],
                ['meal_data' => json_encode($request->meal_data)]
            );
        } else {
            $user->favorites()->where('meal_id', $request->meal_id)->delete();
        }

        // For AJAX requests, return JSON
        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        // For Inertia requests, redirect back
        return back()->with('success', 'Favorite updated successfully');
    }

    public function index()
    {
        $favorites = Auth::user()->favorites()
            ->get()
            ->map(function ($favorite) {
                return [
                    'id' => $favorite->meal_id,
                    'data' => json_decode($favorite->meal_data, true)
                ];
            });

        return Inertia::render('Dashboard/FavoriteNavigation', [
            'favorites' => $favorites
        ]);
    }
}