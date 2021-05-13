<?php

namespace App\Http\Livewire\Creditos;
use App\Models\Credito;
use Livewire\Component;
use Livewire\WithPagination;


class CreditList extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

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
 