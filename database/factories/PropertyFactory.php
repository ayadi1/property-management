<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'surface' => random_int(50, 150),
            'rooms' => random_int(1, 5),
            'bedrooms' => random_int(1, 5),
            'price' => random_int(50000, 1000000),
            'city' => fake()->city(),
            'address' => fake()->address()
        ];
    }
}
