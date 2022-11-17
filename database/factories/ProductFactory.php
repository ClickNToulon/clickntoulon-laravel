<?php

namespace Database\Factories;

use App\Models\ProductPrice;
use App\Models\ProductType;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'product_type_id' => ProductType::factory(),
            'shop_id' => Shop::factory(),
            'image' => fake()->imageUrl(),
        ];
    }
}
