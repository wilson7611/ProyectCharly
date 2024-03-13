<?php

namespace App\Models\compras;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_compra',
        'proveedor_id'
    ];
    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
