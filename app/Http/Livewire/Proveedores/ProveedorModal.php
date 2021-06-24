<?php

namespace App\Http\Livewire\Proveedores;

use App\Models\Proveedor;
use Livewire\Component;

class ProveedorModal extends Component
{
    public $modalCrearProveedor=false;
    // Datos adicionales para CRUD

    public $idProveedor;

    //Datos para el credito
   
    public $modalStyle = 'display:none';
    protected $listeners = [
        'updateShowModal',
        'createShowModal'
    ];
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

    
    public $editando = null;

   /*
    public function render()
    {
        return view('clientes.cliente-modal');
    }*/

    public function rules()
    {
        return [         
            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'nro_documento' => 'required',
            'celular1' => 'required',
            'celular2' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
        ];
    }

    public function updatedNombre($value)
    {
        $this->generateSearch($value);
    }

    public function create()
    {
        $this->validate();
        Proveedor::create($this->modelData());
        $this->resetVars();
        
    }

    public function update()
    {
        $this->validate();
        Proveedor::find($this->modelId)->update($this->modelData());
    }

    public function createShowModal()
    {
        // $this->resetValidation();
        // $this->resetVars();
        $this->modalStyle = 'display:block';
    }

    public function updateShowModal($proveedor)
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $proveedor['id'];
        $this->loadModel($proveedor);   
    }

    public function deleteShowModal($id)
    {
        
    }

    public function loadModel($Proveedor)
    {
        $this->nombres = $Proveedor['nombres'];
        $this->apellidos = $Proveedor['apellidos'];
        $this->tipo_documento = $Proveedor['tipo_documento'];
        $this->nro_documento = $Proveedor['nro_documento'];
        $this->celular1 = $Proveedor['celular1'];
        $this->celular2 = $Proveedor['celular2'];
        $this->direccion = $Proveedor['direccion'];
        $this->correo = $Proveedor['correo'];
        $this->modalStyle = 'display:block';
    }

    public function modelData()
    {
        return [
        'nombres' => $this->nombres,
        'apellidos' => $this->apellidos,
        'tipo_documento' => $this->tipo_documento,
        'nro_documento' => $this->nro_documento,
        'celular1' => $this->celular1,
        'celular2' => $this->celular2,
        'direccion' => $this->direccion,
        'correo' => $this->correo,
        ];
    }

    public function resetVars()
    {
        $this->modelId = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->nro_documento = null;
        $this->tipo_documento = null;
        $this->celular1 = null;
        $this->celular2 = null;
        $this->direccion = null;
        $this->correo = null;
    }

    public function closeModal() {
        $this->modalStyle = 'display:none';
        $this->reset();
        $this->dispatchBrowserEvent('cerrarModal'); 
    }

}
