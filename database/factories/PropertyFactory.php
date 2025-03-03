<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $availableFrom = fake()->dateTimeBetween('now', '+1 month');
        $availableTo = fake()->dateTimeBetween($availableFrom, '+6 months');

        return [
            "title" => fake()->sentence(3),
            "description" => fake()->paragraph(),
            "user_id" => null, // Set in seeder
            "price" => fake()->numberBetween(100, 2200),
            "image" => null,
            "bedrooms" => fake()->numberBetween(1, 6),
            "bathrooms" => fake()->numberBetween(1, 3),
            "address" => fake()->sentence(1),
            "available_from" => $availableFrom,
            "available_to" => $availableTo,
            "city_id" => null, // Set in seeder
            "type_id" => null, // Set in seeder
        ];
    }
}
