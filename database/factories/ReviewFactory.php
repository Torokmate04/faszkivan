<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_Id' => fake()->randomDigit(),
            'event_Id' => fake()->randomDigit(),
            'review' => fake()->sentences(3,true),
            'rating'  => fake()->randomFloat(1,1,6)
        ];
    }
}
