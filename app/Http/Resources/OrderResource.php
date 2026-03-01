<?php

namespace App\Http\Resources;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Order $this */
        // with product details
        return [
            'id' => $this->id,
            'status' => $this->status,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at?->toISOString(),
            'items' => OrderItemResource::collection(
                $this->whenLoaded('orderItems', function ($orderItems) {
                    return $orderItems;
                })
            ),
        ];

    }
}
