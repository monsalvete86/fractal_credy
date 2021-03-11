<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $table = 'creditos';

    protected $fillable = [
        'id_cliente', 'id_deudor', 'valor_credito','nro_cuotas','nro_cuotas_pagas', 'tasa_interes'
    ];

    protected $attributes = [
        'nro_cuotas_pagas' => 0,
        'tasa_interes' => 0,
    ];

}
