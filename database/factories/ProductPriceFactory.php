<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPrice>
 */
class ProductPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'unitPrice' => fake()->randomFloat(0, 0, 100),
            'discount' => fake()->randomFloat(1, 0, 1),
            'discountedPrice' => fake()->randomFloat(0, 0, 100),
            'vat' => fake()->randomFloat(2, 0, 20),
            'vatPrice' => fake()->randomFloat(0, 0, 100),
            'discountedFrom' => fake()->dateTimeBetween('-1 year', 'now'),
            'product_id' => Product::factory(),
        ];
    }
}
