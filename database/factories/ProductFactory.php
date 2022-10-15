<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            Product::NAME => fake()->sentence(3),
            Product::ID => fake()->uuid(),
            Product::CATEGORY_ID => fake()->randomElement([1,2,3,4]),
            Product::AMOUNT => fake()->numberBetween(1000, 999999),
            Product::DESCRIPTION => fake()->text(240)
        ];
    }
}
