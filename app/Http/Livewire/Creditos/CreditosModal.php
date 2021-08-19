<?php

namespace App\Http\Livewire\Creditos;

use App\Models\Credito;
use Livewire\Component;

class CreditosModal extends Component
{
    public $modalStyle = 'display:none';
    protected $listeners = [
        'showData',
        'showClean'
    ];

    public $fullCredito = null;
    public $editando = null;
    public $modelId;
    public $idCredito = '';

    public $id_cliente;
    public $id_deudor;
    public $id_sede;
    public $cant_cuotas;
    public $cant_cuotas_pagadas;
    public $dia_limite;
    public $deudor;
    public $estado;
    public $fecha_inicio;
    public $interes_mensual;
    public $porcent_interes_anual;
    public $porcent_interes_mensual;
    public $usu_crea;
    public $valor_cuota;
    public $valor_credito;
    public $valor_abonado;
    public $valor_capital;
    public $valor_interes;


    protected $rules = [
        'id_cliente' => 'required',
        'id_deudor' => 'required',
        'id_sede' => 'email|required',
        'cant_cuotas' => 'required',
        'cant_cuotas_pagadas' => 'required',
        'dia_limite' => 'required',
        'deudor' => 'required',
        'estado' => 'required',
        'fecha_inicio' => 'required',
        'interes_mensual' => 'required',
        'porcent_interes_anual' => 'required',
        'porcent_interes_mensual' => 'required',
        'usu_crea' => 'required',
        'valor_cuota' => 'required',
        'valor_credito' => 'required',
        'valor_abonado' => 'required',
        'valor_capital' => 'required',
        'valor_interes' => 'required'
    ];

    protected $messages = [
        'id_cliente.required' => 'El id del cliente es requerido.',
        'id_deudor.required' => 'El id del deudor es requerido.',
        'id_sede.required' => 'El id de la sede es requerido.',
    ];

    public function render()
    {
        return view('creditos.creditos-modal');
    }

    public function showClean()
    {
        $this->reset();
        $this->modalStyle = 'display:block';
    }

    public function showData($credito)
    {
        // $credito = Credito::find($this->modelId);
        $this->fullCredito = $credito;
        $this->editando = $credito['id_cliente'];
        $this->idCredito = $credito['id'];

        $this->id_cliente = $credito['id_cliente'];
        $this->id_deudor = $credito['id_deudor'];
        $this->id_deudor = $credito['id_deudor'];
        $this->id_sede = $credito['id_sede'];
        $this->cant_cuotas = $credito['cant_cuotas'];
        $this->cant_cuotas_pagadas = $credito['cant_cuotas_pagadas'];
        $this->dia_limite = $credito['dia_limite'];
        $this->deudor = $credito['deudor'];
        $this->estado = $credito['estado'];
        $this->fecha_inicio = $credito['fecha_inicio'];
        $this->interes_mensual = $credito['interes_mensual'];
        $this->porcent_interes_anual = $credito['porcent_interes_anual'];
        $this->porcent_interes_mensual = $credito['porcent_interes_mensual'];
        $this->usu_crea = $credito['usu_crea'];
        $this->valor_cuota = $credito['valor_cuota'];
        $this->valor_cuota = $credito['valor_cuota'];
        $this->valor_credito = $credito['valor_credito'];
        $this->valor_abonado = $credito['valor_abonado'];
        $this->valor_capital = $credito['valor_capital'];
        $this->valor_interes = $credito['valor_interes'];

        $this->modalStyle = 'display:block';
    }

    public function closeModal()
    {
        $this->modalStyle = 'display:none';
        $this->reset();
        $this->emit('creditoTableUpdate');
        $this->dispatchBrowserEvent('cerrarModal');
    }

    public function crear()
    {
        $data = $this->validate();
        $newCredito = new Credito;
        // dd($this->nombres);
        $this->cargarData($newCredito);
    }

    public function editar()
    {
        $this->validate();
        $oldCredito = Credito::where('email', '=', $this->fullCredito['email'])->firstOrFail();
        $this->cargarData($oldCredito);
    }

    public function cargarData($credito)
    {
        $credito->id_cliente = $this->id_cliente;
        $credito->id_deudor = $this->id_deudor;
        $credito->id_sede = $this->id_sede;
        $credito->cant_cuotas = $this->cant_cuotas;
        $credito->cant_cuotas_pagadas = $this->cant_cuotas_pagadas;
        $credito->dia_limite = $this->dia_limite;
        $credito->deudor = $this->deudor;
        $credito->estado = $this->estado;
        $credito->fecha_inicio = $this->fecha_inicio;
        $credito->interes_mensual = $this->interes_mensual;
        $credito->porcent_interes_anual = $this->porcent_interes_anual;
        $credito->porcent_interes_mensual = $this->porcent_interes_mensual;
        $credito->usu_crea = $this->usu_crea;
        $credito->valor_cuota = $this->valor_cuota;
        $credito->valor_credito = $this->valor_credito;
        $credito->valor_abonado = $this->valor_abonado;
        $credito->valor_capital = $this->valor_capital;
        $credito->valor_interes = $this->valor_abonado;

        $credito->save();
        $this->closeModal();
    }
}
