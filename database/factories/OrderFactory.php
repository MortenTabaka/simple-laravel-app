<?php

namespace Database\Factories;

use App\Models\User;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement([OrderStatus::CREATED, OrderStatus::CONFIRMED]),
            'total_price' => fake()->randomFloat(2, 1000, 4000),
            'user_id' => User::factory(),
        ];
    }
}
