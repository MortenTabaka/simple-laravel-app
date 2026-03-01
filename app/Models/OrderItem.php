<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Pozycja zamówienia w sklepie.
 *
 * @property Order $order Zamówienie, do którego należy pozycja.
 * @property Product $product Produkt, który jest w zamówieniu.
 * @property integer $quantity Ilość produktów w zamówieniu.
 * @property string $unit_price Cena jednostkowa produktu w zamówieniu PLN.
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
}
