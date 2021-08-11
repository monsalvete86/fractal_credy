<?php

namespace App\Http\Livewire\Proveedores;

use App\Models\Proveedor;
use Livewire\Component;

class ProveedorModal extends Component

{
  public $modalStyle = 'display:none';
  protected $listeners = [
    'updateShowModal',
    'createShowModal'
  ];
  public $editando = null;
  public $modelId;
  public $nombres;
  public $apellidos;
  public $tipo_documento;
  public $nro_documento;
  public $celular1;
  public $celular2;
  public $direccion;
  public $email;
  public $idProveedor = '';

  public function render()
  {
    return view('proveedores.proveedor-modal');
  }

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
    $this->resetVars();
  }

  public function update()
  {
    $this->validate();
    Proveedor::find($this->modelId)->update($this->modelData());
  }

  public function createShowModal()
  {
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

  public function closeModal()
  {
    $this->modalStyle = 'display:none';
    $this->reset();
    $this->dispatchBrowserEvent('cerrarModal');
  }

  public function loadModel($proveedor)
  {
    $this->nombres = $proveedor['nombres'];
    $this->apellidos = $proveedor['apellidos'];
    $this->tipo_documento = $proveedor['tipo_documento'];
    $this->nro_documento = $proveedor['nro_documento'];
    $this->celular1 = $proveedor['celular1'];
    $this->celular2 = $proveedor['celular2'];
    $this->direccion = $proveedor['direccion'];
    $this->email = $proveedor['email'];
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
}
