<?php

namespace Tests\Models;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculate_total_price_empty_order(): void
    {
        $order = Order::factory()->create();

        $this->assertEquals(0, $order->calculateTotalPrice());
    }

    public function test_calculate_total_price_with_one_item(): void
    {
        $order = Order::factory()
            ->has(OrderItem::factory()->count(1)->state(['price' => 100]))
            ->create();

        $this->assertEquals(100, $order->calculateTotalPrice());
    }
}
