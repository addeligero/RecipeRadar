<?php

use App\Models\MyFavorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'meal_id' => 'required|string',
            'meal_name' => 'required|string',
            'meal_thumb' => 'nullable|string',
        ]);

        MyFavorite::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'meal_id' => $request->meal_id,
            ],
            [
                'meal_name' => $request->meal_name,
                'meal_thumb' => $request->meal_thumb,
            ]
        );

        return response()->json(['message' => 'Added to favorites']);
    }
}
