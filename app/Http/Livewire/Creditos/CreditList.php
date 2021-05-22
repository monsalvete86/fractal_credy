<?php

namespace App\Http\Livewire\Creditos;
use App\Models\Credito;
use Livewire\Component;
use Livewire\WithPagination;


class CreditList extends Component
{
  use WithPagination;
  public $modalCrearCredito=false;
  // Datos adicionales para CRUD

  protected $paginationTheme = 'bootstrap';

  public function createModalCredito(){
      $this->modalCrearCredito = true;
  }
  public function updateModalCredito($id)
  {
      $this->idCredito = $id;
      $this->modalCrearCredito = true;
      $this->cargarDatos();
    
  }

    public function read(){
        return Credito::paginate(10);
    }
    public function render()
    {
        return view('creditos.credit-list', [
          'creditos' => $this->read(),
        ]);
    }

    
}
 