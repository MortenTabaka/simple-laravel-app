<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_order(): void
    {
        $product = Product::factory()->create(); // ensure product exists

        $storeOrderRequest = [
            'items' => [
                ['product_id' => $product->id, 'quantity' => 1],
            ],
        ];

        $response = $this->postJson('/api/orders', $storeOrderRequest);

        $response->assertStatus(201);
    }
}
