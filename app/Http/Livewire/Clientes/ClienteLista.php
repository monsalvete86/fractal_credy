<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class ClienteLista extends Component
{
  use WithPagination;

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
      return view('clientes.cliente-lista', [
        'clientes' => $this->read(),
      ]);
    }
}
