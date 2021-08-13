<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;

class ClienteLista extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $textSearch = '';

  public function crearCliente()
  {
    $this->emit('createShowModal');
  }

  public function actualizarCliente($id)
  {
    $this->emit('updateShowModal', $id);
  }

  public function delete($id)
  {
    Cliente::find($id)->delete();
    session()->flash('message', 'Post Deleted Successfully.');
    $this->render();
  }

  public function read()
  {
    return Cliente::paginate(10);
  }

  public function render()
  {
    $clientes = Cliente::where(function ($query) {
      $query->select('*')->where('nombres', 'like', "$this->textSearch%")
        ->orWhere('apellidos', 'like', "$this->textSearch%")
        ->orWhere('email', 'like', "$this->textSearch%");
    });

<<<<<<< HEAD
    $clientes = $clientes->orderBy('nombres')->orderBy('apellidos')->paginate(10);
=======
    $clientes = $clientes->orderBy('nombres')->orderBy('apellidos')->paginate(1);
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5

    return view('clientes.cliente-lista', [
      'clientes' => $clientes,
    ]);
<<<<<<< HEAD
  }

  public function delete($id)
  {
    Cliente::find($id)->delete();
    session()->flash('message', 'Cliente Eliminado.');
    $this->render();
=======
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5
  }

   /**
      public function delete($id)
      {
        Cliente::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
        $this->render();
      }
     */
}
