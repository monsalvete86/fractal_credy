<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class Proveedores extends Component
{
    public $modalCrearProveedor=false;
    // Datos adicionales para CRUD

    public $idProveedor;

    //Datos para el credito
   
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

    public function updateModalProveedor($id)
    {
        $this->idProveedor = $id;
        $this->modalCrearProveedor = true;
        $this->cargarDatos();
       
    }
    public function cargarDatos(){
        $proveedor = Proveedor::find($this->idProveedor);
        $this->nombres  = $proveedor->nombres;
        $this->apellidos  = $proveedor->apellidos;
        $this->tipo_documento  = $proveedor->tipo_documento;
        $this->nro_documento  = $proveedor->nro_documento;
        $this->celular1  = $proveedor->celular1;
        $this->celular2  = $proveedor->celular2;
        $this->direccion  = $proveedor->direccion;
        $this->correo  = $proveedor->correo;
    }
}
