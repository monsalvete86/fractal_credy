<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClienteModal extends Component

{
    public $modalStyle = 'display:none';
    protected $listeners = [
        'showData',
        'showClean'
    ];

    public $fullCliente = null;
    public $editando = null;
    public $modelId;
    public $idCliente = '';

    public $nombres;
    public $apellidos;
    public $tipo_documento;
    public $nro_documento;
    public $email;
    public $fecha_nacimiento;
    public $genero;
    public $celular1;
    public $celular2;
    public $direccion;
    public $estado_civil;
    public $lugar_trabajo;
    public $cargo;
    public $independiente;
    public $image;


    protected $rules = [
        'nombres' => 'required|min:3',
        'apellidos' => 'required',
        'email' => 'email|required',
        'tipo_documento' => 'required',
        'nro_documento' => 'required',
    ];

    protected $messages = [
        'nombres.required' => 'El nombre de es requerido.',
        'email.required' => 'Debe ingresar un correo válido.',
        'tipo_documento.required' => 'Debe ingresar el tipo de documento.',
        'nro_documento.required' => 'Debe ingresar el numero de documento.',
    ];

    public function render()
    {
        return view('clientes.cliente-modal');
    }

    public function showClean()
    {
        $this->reset();
        $this->modalStyle = 'display:block';
    }

    public function showData($cliente)
    {
        // $cliente = Cliente::find($this->modelId);
        $this->fullCliente = $cliente;
        $this->editando = $cliente['email'];
        $this->idCliente = $cliente['id'];

        $this->nombres = $cliente['nombres'];
        $this->apellidos = $cliente['apellidos'];
        $this->tipo_documento = $cliente['tipo_documento'];
        $this->nro_documento = $cliente['nro_documento'];
        $this->email = $cliente['email'];
        $this->fecha_nacimiento = $cliente['fecha_nacimiento'];
        $this->genero = $cliente['genero'];
        $this->celular1 = $cliente['celular1'];
        $this->celular2 = $cliente['celular2'];
        $this->direccion = $cliente['direccion'];
        $this->estado_civil = $cliente['estado_civil'];
        $this->lugar_trabajo = $cliente['lugar_trabajo'];
        $this->cargo = $cliente['cargo'];
        $this->independiente = $cliente['independiente'];
        $this->image = $cliente['image'];

        $this->modalStyle = 'display:block';
    }

    public function closeModal()
    {
        $this->modalStyle = 'display:none';
        $this->reset();
        $this->emit('clienteTableUpdate');
        $this->dispatchBrowserEvent('cerrarModal');
    }

    public function crear()
    {
        $data = $this->validate();
        $newCliente = new Cliente;
        // dd($this->nombres);
        $this->cargarData($newCliente);
    }

    public function editar()
    {
        $this->validate();
        $oldCliente = Cliente::where('email', '=', $this->fullCliente['email'])->firstOrFail();
        $this->cargarData($oldCliente);
    }

    public function cargarData($cliente)
    {
        $cliente->nombres = $this->nombres;
        $cliente->apellidos = $this->apellidos;
        $cliente->tipo_documento = $this->tipo_documento;
        $cliente->nro_documento = $this->nro_documento;
        $cliente->fecha_nacimiento = $this->fecha_nacimiento;
        $cliente->genero = $this->genero;
        $cliente->celular1 = $this->celular1;
        $cliente->celular2 = $this->celular2;
        $cliente->direccion = $this->direccion;
        $cliente->email = $this->email;
        $cliente->estado_civil = $this->estado_civil;
        $cliente->lugar_trabajo = $this->lugar_trabajo;
        $cliente->cargo = $this->cargo;
        $cliente->independiente = $this->independiente;
        $cliente->image = $this->image;

        $cliente->save();
        $this->closeModal();
    }
}
