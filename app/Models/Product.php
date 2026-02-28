<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Produkt sprzedawany w sklepie.
 *
 * @property string $name Nazwa produktu.
 * @property string $sku Kod produktu.
 * @property decimal $price Cena produktu PLN.
 * @property boolean $active Czy produkt jest dostępny.
 */
class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'active'];

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
}
