<?php

namespace App\Http\Livewire;
use App\Models\Credito;
use Livewire\Component;


class Creditos extends Component
{

    public $modalCrearCredito=false;
    // Datos adicionales para CRUD

    public $idCredito;

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
    public function datosActualizar(){
        return [            
            $this->id_cliente  = $data->id_cliente,
            $this->id_deudor = $data->id_deudor,
            $this->valor_credito = $data->valor_credito,
            $this->interes_mensual = $data->interes_mensual,
            $this->cant_cuotas = $data->cant_cuotas,
            $this->cant_cuotas_pagadas = $data->cant_cuotas_pagadas,
            $this->dia_limite = $data->dia_limite,
            $this->deudor = $data->deudor,
            $this->estado = $data->estado,
            $this->fecha_inicio = $data->fecha_inicio,
            $this->id_sede = $data->id_sede,
            $this->porcent_interes_anual = $data->porcent_interes_anual,
            $this->porcent_interes_mensual = $data->porcent_interes_mensual,
            $this->usu_crea = $data->usu_crea,
            $this->valor_abonado = $data->valor_abonado,
            $this->valor_capital = $data->valor_capital,
            $this->valor_cuota = $data->valor_cuota,
            $this->valor_interes = $data->valor_interes,
        ];
    }

    public function createModalCredito(){
        $this->modalCrearCredito = true;
    }
    public function updateModalCredito($id)
    {
        $this->idCredito = $id;
        $this->modalCrearCredito = true;
        $this->cargarDatos();
       
    }
    

    public function cargarDatos(){
        $credito = Credito::find($this->idCredito);
        $this->id_cliente  = $credito->id_cliente;
        $this->id_deudor = $credito->id_deudor;
        $this->valor_credito = $credito->valor_credito;
        $this->interes_mensual = $credito->interes_mensual;
        $this->cant_cuotas = $credito->cant_cuotas;
        $this->cant_cuotas_pagadas = $credito->cant_cuotas_pagadas;
        $this->dia_limite = $credito->dia_limite;
        $this->deudor = $credito->deudor;
        $this->estado = $credito->estado;
        $this->fecha_inicio = $credito->fecha_inicio;
        $this->id_sede = $credito->id_sede;
        $this->porcent_interes_anual = $credito->porcent_interes_anual;
        $this->porcent_interes_mensual = $credito->porcent_interes_mensual;
        $this->usu_crea = $credito->usu_crea;
        $this->valor_abonado = $credito->valor_abonado;
        $this->valor_capital = $credito->valor_capital;
        $this->valor_cuota = $credito->valor_cuota;
        $this->valor_interes = $credito->valor_interes;
        
    }

    public function read(){
        return Credito::paginate(10);
    }
    public function render()
    {
        return view('livewire.credito.creditos', [
            'creditos' => $this->read(),
        ]);
    }

    
}
 