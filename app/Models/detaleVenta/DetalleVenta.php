<?php

namespace App\Models\detaleVenta;

use App\Models\producto\Producto;
use App\Models\venta\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'subttoal',
        'venta_id',
        'producto_id'
    ];

    public function ventas()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
