<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SHop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->userName(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'slug' => fake()->slug(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'postalCode' => "83000",
            'isBanned' => fake()->boolean(),
            'isVerified' => fake()->boolean(),
        ];
    }
}
