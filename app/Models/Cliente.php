<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    use HasFactory;

    

    protected $table = 'clientes';

    protected $fillable = [
       'nombres', 
       'apellidos', 
       'tipo_documento', 
       'nro_documento', 
       'fecha_nacimiento', 
       'email',
       'genero', 
       'celular1', 
       'celular2', 
       'direccion', 
       'estado_civil', 
       'lugar_trabajo', 
       'cargo', 
       'independiente', 
       'foto'
    ];

    // Valor por defecto en los campos
    protected $attributes = [
       
    ];
    protected $guarded = [];
    
    public function creditos()
    {
        return $this->hasMany(Credito::class);
    }
    
}
