<?php

namespace App\Http\Livewire;


use App\Models\Credito;
use Livewire\Component;


class Creditos extends Component
{

    public $modalCrearCredito=false;
    // Revisar para eliminar
    public $title;    
    public $content;

    //Datos para el credito
    
    public $id_cliente;
    public $id_deudor;
    public $valor_credito;
    public $nro_cuotas;
    public $nro_cuotas_pagas;
    public $tasa_interes;  
    
    
     public function create()
    {
        Credito::create($this->datosCredito());
        $this->modalCrearCredito=false; 
    }

    public function datosCredito(){
        return [
            
            'id_cliente' => $this->id_cliente,
            'id_deudor' => $this->id_deudor,
            'valor_credito' => $this->valor_credito,
            'nro_cuotas' => $this->nro_cuotas,
            'nro_cuotas_pagas' => $this->nro_cuotas_pagas,
            'tasa_interes' => $this->tasa_interes
        ];
    }

    public function createModalCredito(){
        $this->modalCrearCredito = true;
    }

    public function read(){
        return Credito::paginate(10);
    }
    public function render()
    {
        return view('livewire.creditos', [
            'creditos' => $this->read(),
        ]);
    }

    
}
 