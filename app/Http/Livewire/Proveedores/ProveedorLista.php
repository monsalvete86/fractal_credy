<?php

namespace App\Http\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class ProveedorLista extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function crearProveedor()
  {
    $this->emit('createShowModal');
  }

  public function actualizarProveedor($id)
  {
    $this->emit('updateShowModal', $id);
  }


  public function read()
  {
    return Proveedor::paginate(10);
  }
  public function render()
  {

    $proveedores = Proveedor::paginate(10);
    return view('proveedores.proveedor-lista', [
      'proveedores' => $proveedores,
    ]);
  }
}