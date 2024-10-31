<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['marca_id', 'nombre', 'unidad_medida', 'observaciones', 'cantidad_inventario', 'fecha_embarque'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
