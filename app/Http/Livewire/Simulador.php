<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Simulador extends Component
{
    public function render()
    {
        return view('livewire.simulador', [
            'data' => $this->read(),
        ]);
    }
}
