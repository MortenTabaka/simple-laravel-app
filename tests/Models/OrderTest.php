<?php

namespace Tests\Models;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_calculates_total_for_empty_order()
    {
        $order = Order::factory()->create();

        $this->assertEquals(0, $order->calculateTotalPrice());
    }

    #[Test]
    public function it_calculates_total_for_single_item()
    {
        $order = Order::factory()
            ->has(OrderItem::factory()->count(1)->state([
                'price' => 100,
                'quantity' => 1, // ⚡ important
            ]))
            ->create();

        $this->assertEquals(100, $order->calculateTotalPrice());
    }

    #[Test]
    public function it_calculates_total_for_multiple_items()
    {
        $order = Order::factory()
            ->has(OrderItem::factory()->count(3)->state([
                'price' => 50,
                'quantity' => 2,
            ]))
            ->create();

        // 3 items × 50 × 2 = 300
        $this->assertEquals(300, $order->calculateTotalPrice());
    }

    #[Test]
    public function it_calculates_total_with_mixed_quantities()
    {
        $order = Order::factory()->create();

        OrderItem::factory()->create([
            'order_id' => $order->id,
            'price' => 30,
            'quantity' => 1,
        ]);

        OrderItem::factory()->create([
            'order_id' => $order->id,
            'price' => 20,
            'quantity' => 3,
        ]);

        // Total = 30*1 + 20*3 = 90
        $this->assertEquals(90, $order->calculateTotalPrice());
    }
}
