<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $table = 'creditos';

    protected $fillable = [
        'id_cliente', 'id_deudor','cant_cuotas','cant_cuotas_pagadas','dia_limite','deudor','estado','fecha_inicio','id_sede','interes_mensual','porcent_interes_anual','porcent_interes_mensual','tasa_interes','usu_crea','valor_abonado','valor_capital','valor_credito','valor_cuota','valor_interes'
    ];

    protected $attributes = [
        'cant_cuotas_pagadas' => 0,
        'interes_mensual' => 0,
        'estado' => 0,
    ];

}
