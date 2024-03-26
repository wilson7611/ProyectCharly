<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'categoria_id', 'imagen'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
