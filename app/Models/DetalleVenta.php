<?php

namespace App\Models;
use App\Models\Producto;
use App\Models\Venta;
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
