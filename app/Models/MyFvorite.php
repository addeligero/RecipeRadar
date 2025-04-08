<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meal_id',
        'meal_name',
        'meal_thumb',
    ];


}
