<?php

namespace App\Http\Livewire;



use Livewire\Component;
use App\Models\Credito;

class Creditos extends Component
{
    public $count=0;
    public function read(){
        return Credito::paginate(10);
    }
    

    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.creditos', [
            'creditos' => $this->read(),
        ]);
    }

    
}
