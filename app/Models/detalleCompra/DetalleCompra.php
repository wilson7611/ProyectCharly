<?php

namespace App\Models\detalleCompra;

use App\Models\compras\Compras;
use App\Models\producto\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];
    public function compras()
    {
        return $this->belongsTo(Compras::class, 'compra_id');
    }
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
