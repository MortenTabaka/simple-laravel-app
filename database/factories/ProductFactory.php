<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'sku' => fake()->ean8(),
            'price' => fake()->randomFloat(2, 1, 300),
            'stock' => fake()->numberBetween(1, 100),
            'active' => fake()->boolean(80),
        ];
    }
}
