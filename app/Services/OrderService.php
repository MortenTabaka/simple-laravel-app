<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class OrderService
{
    /**
     * @param array $data
     * @return Order
     * @throws \Throwable
     */
    public function createFromItems(array $data): Order
    {
        return DB::transaction(function () use ($data) {

            // create empty order
            $order = Order::create([]);

            foreach ($data['items'] as $itemData) {

                /** @var Product $product */
                $product = Product::lockForUpdate()
                    ->findOrFail($itemData['product_id']);

                // check stock
                if ($product->stock < $itemData['quantity']) {
                    throw new Exception(
                        "Zbyt mało sztuk produktu {$product->name} ({$product->sku}) dostępne: {$product->stock}"
                    );
                }

                // create order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $itemData['quantity'],
                    'unit_price' => $product->price,
                ]);

                // decrease stock
                $product->decrementStock($itemData['quantity']);
            }

            return $order->load('orderItems');
        });
    }

    public function getOrderWithItems(Order $order): Order
    {
        return $order->load('orderItems');
    }
}
