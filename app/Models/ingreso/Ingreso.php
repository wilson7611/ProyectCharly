<?php

namespace App\Models\ingreso;

use App\Models\MovientoContable;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_ingreso',
        'concepto',
        'monto',
        'venta_id',
        'movimiento_contable_id'

    ];

    public function ventas()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function movimiento_contables()
    {
        return $this->belongsTo(MovientoContable::class, 'movimiento_contable_id');
    }
}
