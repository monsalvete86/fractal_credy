<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class ClienteLista extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function crearCliente()
  {
    $this->emit('createShowModal');
  }

  public function actualizarCliente($id)
  {
    $this->emit('updateShowModal', $id);
  }


  public function read()
  {
    return Cliente::paginate(10);
  }
  public function render()
  {

    $clientes = Cliente::paginate(10);
    return view('clientes.cliente-lista', [
      'clientes' => $clientes,
    ]);
  }
}
