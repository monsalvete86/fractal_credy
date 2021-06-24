<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;



class Proveedor extends Model
{
    use HasFactory;


    protected $table = 'proveedores';

    protected $fillable = [
        'nombres', 
        'apellidos', 
        'tipo_documento', 
        'nro_documento', 
        'genero',
        'celular1', 
        'celular2', 
        'diraccion',
        'correo',   
    ];

    protected $attributes = [];
    protected $guarded = [];
    
    public function proveedor()
    {
        return $this->hasMany(Proveedor::class);
    }

}