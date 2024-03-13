<?php

namespace App\Models\producto;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'categoria_id'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
