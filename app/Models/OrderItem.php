<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Pozycja zamówienia w sklepie.
 *
 * @property integer $order_id Identyfikator zamówienia.
 * @property integer $product_id Identyfikator produktu.
 * @property integer $quantity Ilość produktów w zamówieniu.
 * @property string $unit_price Cena jednostkowa produktu w zamówieniu PLN.
 *
 * @property-read Order $order Zamówienie, do którego należy pozycja.
 * @property-read Product $product Produkt, który jest w zamówieniu.
 */
class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'unit_price'];

    public static function create(array $array)
    {
        return static::query()->create($array);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
