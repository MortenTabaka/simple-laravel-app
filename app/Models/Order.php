<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Zamówienie w sklepie.
 *
 * @property integer $id Identyfikator zamówienia.
 * @property string $status Status zamówienia.
 * @property string $total_price Cena zamówienia PLN.
 * @property User $user Użytkownik, który złożył zamówienie.
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
