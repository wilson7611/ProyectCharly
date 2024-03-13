<?php

namespace App\Models;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombres', 'apellidos', 'direccion', 'telefono', 'email'];
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
