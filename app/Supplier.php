<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'clientes';
    // Insercción-Actualizacion masiva de info. Es obligatorio especificar los campos que se van a permitir manipular de forma masiva; 
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
        'image'
    ];
    // protected $rules = ['description' => 'required|min:4'];

}
