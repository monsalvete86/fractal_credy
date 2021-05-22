<?php

namespace App\Http\Livewire\User;

use App\Models\Credito;
use Livewire\Component;

class UserModal extends Component
{  
  protected $listeners = [
    'showData',
    'showClean'
  ];

  public function createModalCredito(){
    $this->modalCrearCredito = true;
  }
  public function updateModalCredito($id)
  {
    $this->idCredito = $id;
    $this->modalCrearCredito = true;
    $this->cargarDatos();
  
  }
  public function render()
  {
    return view('creditos.credit-modal');
  }
}
