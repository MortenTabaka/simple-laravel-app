<?php

namespace App\Models;

use App\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Zamówienie w sklepie.
 *
 * @property integer $id Identyfikator zamówienia.
 * @property string $status Status zamówienia.
 * @property string $total_price Cena zamówienia PLN.
 * @property User $user Użytkownik, który złożył zamówienie.
 * @property-read OrderItem[] $orderItems Pozycje zamówienia.
 */
class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ['status', 'total_price', 'user_id'];

    public static function inRandomOrder(): Builder
    {
        return static::query()->inRandomOrder();
    }

    public static function findOrFail(string $id): Order
    {
        return static::query()->findOrFail($id);
    }

    public static function create(array $array): Order
    {
        return static::query()->create($array);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
