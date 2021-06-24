<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

class CreditosModal extends Component
{
    public $modalStyle = 'display:none';
    protected $listeners = [
        'showData',
        'showClean'
    ];
    public $editando = null;

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
        return view('creditos.creditos-modal');
    }
}
