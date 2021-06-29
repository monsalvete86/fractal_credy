<?php

namespace App\Http\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class ProveedorLista extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $textSearch = '';
  
  public function crearProveedor() {
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

  public function render() {
    $proveedores = Proveedor::where(function($query) {
      $query->select('*')->where('nombres', 'like', "$this->textSearch%")
      ->orWhere('apellidos', 'like', "$this->textSearch%")
      ->orWhere('email', 'like', "$this->textSearch%");
    });

    $proveedores = $proveedores->orderBy('nombres')->orderBy('apellidos')->paginate(10);
  
    return view('proveedores.proveedor-lista', [
      'proveedores' => $proveedores,
    ]);
  }  
}
