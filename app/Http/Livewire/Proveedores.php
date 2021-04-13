<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class Proveedores extends Component
{
   
    public $modelId;
    public $nombres;
    public $apellidos;
    public $tipo_documento;
    public $nro_documento;
    public $celular1;
    public $celular2;
    public $direccion;
    public $correo;


    public function read()
    {
        return Proveedor::paginate(5);
    }

    public function render()
    {
        return view('livewire.proveedores', [
            'proveedores' => $this->read()
        ]);
    }
}
