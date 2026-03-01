<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\OrderStatus;
use Illuminate\Support\Facades\DB;
use Exception;

class OrderService
{
    /**
     * Create order from validated items.
     */
    public function createFromItems(array $items): Order
    {
        return DB::transaction(function () use ($items) {

            $order = Order::create(['status' => OrderStatus::CREATED]);

            foreach ($items as $item) {



                $product = Product::query()
                    ->lockForUpdate()
                    ->findOrFail($item['product_id']);

                if ($product->active === false) {
                    throw new Exception(
                        "Product {$product->name} is not active"
                    );
                }

                if ($product->stock < $item['quantity']) {
                    throw new Exception(
                        "Not enough stock for {$product->name}"
                    );
                }

                $order->orderItems()->create([
                    'product_id' => $product->id,
                    'quantity'   => $item['quantity'],
                    'unit_price' => $product->price,
                ]);

                $product->decrementStock($item['quantity']);
            }

            return $order->load('orderItems.product');
        });
    }

    public function getOrderWithItems(Order $order): Order
    {
        return $order->load('orderItems.product');
    }
}
