<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\{Component, WithPagination};

class ClienteLista extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  public $textSearch = '';

  public $cont = 1;

  protected $listeners = [
    'clienteTableUpdate' => 'render',
    'delete',
  ];

  public function render()
  {

    $clientes = Cliente::where(function ($query) {
      $query->select('*')->where('nombres', 'like', "$this->textSearch%")
        ->orWhere('apellidos', 'like', "$this->textSearch%")
        ->orWhere('email', 'like', "$this->textSearch%");
    });

    $clientes = $clientes->orderBy('nombres')->orderBy('apellidos')->paginate(10);

    return view('clientes.cliente-lista', [
      'clientes' => $clientes,
    ]);
  }

  public function updatingTextSearch()
  {
    $this->resetPage();
  }


  public function showModal($cliente)
  {
    $this->emit('showData', $cliente);
  }

  public function newCliente()
  {
    $this->emit('showClean');
  }


  public function delete($id)
  {
    Cliente::find($id)->delete();
    session()->flash('message', 'Cliente Eliminado.');
    $this->render();
  }
}
