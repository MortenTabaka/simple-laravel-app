<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Produkt sprzedawany w sklepie.
 *
 * @property integer $id Identyfikator produktu.
 * @property string $name Nazwa produktu.
 * @property string $sku Kod produktu.
 * @property decimal $price Cena produktu PLN.
 * @property boolean $active Czy produkt jest dostępny.
 * @property integer $stock Ilość dostępnych sztuk produktu.
 */
class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'stock', 'active'];

    public static function inRandomOrder(): Builder
    {
        return static::query()->inRandomOrder();
    }

    public static function create(array $all)
    {
        return static::query()->create($all);
    }

    public static function lockForUpdate()
    {
        return static::query()->lockForUpdate();
    }

    public function decrementStock(mixed $quantity)
    {
        $this->decrement('stock', $quantity);
    }

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
}
