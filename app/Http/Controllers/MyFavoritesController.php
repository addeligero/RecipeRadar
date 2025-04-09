<?php

namespace App\Http\Controllers;

use App\Models\MyFavorites;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Inertia\Inertia;

class MyFavoritesController extends Controller
{
    /**
     * Store a new favorite meal.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'meal_id' => 'required|string',
                'meal_name' => 'required|string',
                'meal_thumb' => 'required|url',
            ]);

            $existingFavorite =     MyFavorites::where('user_id', $request->user()->id)
                                        ->where('meal_id', $request->meal_id)
                                        ->first();

            if ($existingFavorite) {
                return response()->json(['message' => 'Meal is already in your favorites.'], 400);
            }

            $favorite = MyFavorites::create([
                'user_id' => $request->user()->id,
                'meal_id' => $request->meal_id,
                'meal_name' => $request->meal_name,
                'meal_thumb' => $request->meal_thumb,
            ]);

            return response()->json([
                'message' => 'Meal added to favorites!',
                'favorite' => $favorite
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error: ' . $e->getMessage()], 500);
        }
    }
    public function index(Request $request)
    {
    

        $favorites = MyFavorites::where('user_id', $request->user()->id)->get();

        return Inertia::render('Favorites', [
            'favorites' => $favorites,
        ]);
    }


}
