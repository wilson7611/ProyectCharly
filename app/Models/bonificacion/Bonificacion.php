<?php

namespace App\Models\bonificacion;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'descuento',
        'cliente_id'
    ];
    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
