<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    // Añadimos esto para permitir la creación masiva más adelante
    protected $fillable = ['name', 'contact_person', 'phone', 'email'];

    /**
     * Define la relación "uno a muchos": un proveedor tiene muchos productos.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
