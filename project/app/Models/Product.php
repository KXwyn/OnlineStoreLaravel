<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Añadimos esto para permitir la creación masiva más adelante
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'provider_id'
    ];

    /**
     * Define la relación "pertenece a": un producto pertenece a una categoría.
     */
    public function category()
    {
        // El nombre de la función es en singular ('category') porque devuelve un solo modelo.
        return $this->belongsTo(Category::class);
    }

    /**
     * Define la relación "pertenece a": un producto pertenece a un proveedor.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
