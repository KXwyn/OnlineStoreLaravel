<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Añadimos esto para permitir la creación masiva más adelante
    protected $fillable = ['name', 'description'];

    /**
     * Define la relación "uno a muchos": una categoría tiene muchos productos.
     */
    public function products()
    {
        // El nombre de la función es en plural ('products') porque devuelve una colección.
        return $this->hasMany(Product::class);
    }
}
