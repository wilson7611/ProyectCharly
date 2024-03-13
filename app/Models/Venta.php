<?php

namespace App\Models;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_venta',
        'total',
        'cliente_id',
        'vendedor_id',
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function vendedores()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
