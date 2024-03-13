<?php

namespace App\Models\egreso;

use App\Models\compras\Compras;
use App\Models\MovientoContable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_egreso',
        'concepto',
        'monto',
        'compra_id',
        'movimiento_contable_id'
    ];

    public function compras()
    {
        return $this->belongsTo(Compras::class, 'compra_id');
    }
    public function movimientoContables()
    {
        return $this->belongsTo(MovientoContable::class, 'movimiento_contable_id');
    }
}
