<?php

namespace App\Http\Livewire;


use App\Models\Credito;
use Livewire\Component;


class Creditos extends Component
{

    public $modalCrearCredito=false;
    // Revisar para eliminar
    // public $title;    
    // public $content;

    //Datos para el credito
    
    public $id_cliente;
    public $id_deudor;
    public $valor_credito;
    public $interes_mensual;  
    public $cant_cuotas;
    public $cant_cuotas_pagadas;
    public $dia_limite;
    public $deudor;
    public $estado;
    public $fecha_inicio;
    public $id_sede;
    public $porcent_interes_anual;
    public $porcent_interes_mensual;
    public $tasa_interes;
    public $usu_crea;
    public $valor_abonado;
    public $valor_capital;
    public $valor_cuota;
    public $valor_interes;
    
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
            'interes_mensual' => $this->interes_mensual,
            'cant_cuotas' => $this->cant_cuotas,
            'cant_cuotas_pagadas' => $this->cant_cuotas_pagadas,
            'dia_limite' => $this->dia_limite,
            'deudor' => $this->deudor,
            'estado' => $this->estado,
            'fecha_inicio' => $this->fecha_inicio,
            'id_sede' => $this->id_sede,
            'porcent_interes_anual' => $this->porcent_interes_anual,
            'porcent_interes_mensual' => $this->porcent_interes_mensual,            
            'usu_crea' => $this->usu_crea,
            'valor_abonado' => $this->valor_abonado,
            'valor_capital' => $this->valor_capital,
            'valor_cuota' => $this->valor_cuota,
            'valor_interes' => $this->valor_interes,
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
 