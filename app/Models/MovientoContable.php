<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovientoContable extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_movimiento', 'concepto', 'fecha_movimiento', 'monto'];
}
