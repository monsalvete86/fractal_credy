<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedores extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modelId;
    public $nombres;
    public $apellidos;
    public $tipo_documento;
    public $nro_documento;
    public $celular1;
    public $celular2;
    public $direccion;
    public $email;

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
            'email' => 'required',
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
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function read()
    {
        return Proveedor::paginate(2);
    }

    public function update()
    {
        $this->validate();
        Proveedor::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        
    }

    public function loadModel()
    {
        $data = Proveedor::find($this->modelId);
        $this->nombres = $data->nombres;
        $this->apellidos = $data->apellidos;
        $this->tipo_documento = $data->tipo_documento;
        $this->nro_documento = $data->nro_documento;
        $this->celular1 = $data->celular1;
        $this->celular2 = $data->celular2;
        $this->direccion = $data->direccion;
        $this->email = $data->email;
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
          'email' => $this->email,
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
        $this->email = null;
    }
   
    public function render()
    {
        return view('livewire.proveedores', [
            'proveedores' => $this->read(),
        ]);
    }
}
