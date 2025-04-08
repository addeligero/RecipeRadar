<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class FavoriteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_add_meal_to_favorites()
    {
        // Create a test user
        $user = User::factory()->create();

        // Act as the test user
        $this->actingAs($user);

        // Prepare the data
        $data = [
            'meal_id' => '12345',
            'meal_name' => 'Pizza',
            'meal_thumb' => 'https://example.com/pizza.jpg',
        ];

        // Send POST request to add favorite
        $response = $this->post('/favorites', $data);

        // Check if the response is correct
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'Meal added to favorites!',
        ]);

        // Check if the meal was added to the database
        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'meal_id' => $data['meal_id'],
            'meal_name' => $data['meal_name'],
            'meal_thumb' => $data['meal_thumb'],
        ]);
    }

    /** @test */
    public function user_must_be_authenticated_to_add_favorite()
    {
        // Send POST request without being authenticated
        $response = $this->post('/favorites', [
            'meal_id' => '12345',
            'meal_name' => 'Pizza',
            'meal_thumb' => 'https://example.com/pizza.jpg',
        ]);

        // Check if the user is redirected to login
        $response->assertStatus(302); // Redirect to login
    }
}
