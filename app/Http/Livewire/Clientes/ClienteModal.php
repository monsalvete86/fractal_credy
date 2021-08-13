<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClienteModal extends Component

{
    public $modalStyle = 'display:none';
    protected $listeners = [
        'updateShowModal',
        'createShowModal'
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
    public $foto;

    // protected $rules = [
    //     'nombres' => 'required|min:3',
    //     'apellidos' => 'required',
    //     'email' => 'email|required',
    //     'nro_documento' => 'required',
    //     'tipo_documento' => 'required',
    //     'celular1' => 'required',
    // ];

    // protected $messages = [
    //     'nombres.required' => 'El nombre es requerido.',
    //     'apellidos.required' => 'Apellido requerido.',
    //     'email.required' => 'Debe ingresar un correo válido.',
    //     'nro_documento.required' => 'Debe ingresar el numero de documento.',
    // ];


    public function render()
    {
        return view('clientes.cliente-modal');
    }
    /**
     * shows the form modal
     * of the create fuction.
     * 
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalStyle = 'display:block';
    }

    /**
     * Shows the form model
     * in update mode.
     * 
     * @param mixed $id
     * @return void
     */
    /**
     * The validation rules
     * 
     * @return void
     */
    public function rules()
    {
        return [
            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'nro_documento' => 'required',
            'email' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular1' => 'required',
            'celular2' => 'required',
            'direccion' => 'required',
            'estado_civil' => 'required',
            'lugar_trabajo' => 'required',
            'cargo' => 'required',
            // 'independiente' => 'required',
            // 'foto' => 'required',
        ];
    }



    public function showData($cliente)
    {
        $this->fullCliente = $cliente;
        $this->idUsuario = $cliente['id'];
        $this->editando = $cliente['nombred'];
        $this->nombreCorto = $cliente['apellidos'];
        $this->nombreUsuario = $cliente['tipo_documento'];
        $this->email = $cliente['nro_documento'];
        $this->profilePhotoPath = $cliente['fecha_nacimiento'];
        $this->celular = $cliente['genero'];
        $this->direccion = $cliente['celular1'];
        $this->tipoDocumento = $cliente['culular2'];
        $this->documento = $cliente['direccion'];
        $this->idRol = $cliente['email'];
        $this->idSede = $cliente['estado_civil'];
        $this->idSede = $cliente['lugar_trabajo'];
        $this->idSede = $cliente['cargo independiente'];
        $this->idSede = $cliente['foto'];

        $this->modalStyle = 'display:block';
    }

    public function closeModal()
    {
        $this->modalStyle = 'display:none';
        $this->reset();
        $this->dispatchBrowserEvent('cerrarModal');
    }

    /**
     * Runs everytime the title
     * variable is updated.
     * 
     * @param mixed $value
     * @return void
     */

    public function updatedNombre($value)
    {
        $this->generateSearch($value);
    }


    /**
     * The create function.
     * 
     * @return void
     */
    public function create()
    {
        $this->validate();
        $newCliente = new Cliente;
        $this->cargarData($newCliente);
        // Cliente::create($this->modelData());
        // $this->resetVars();
    }


    public function update()
    {
        $this->validate();
        Cliente::find($this->modelId)->update($this->modelData());
    }


    public function cargarData($cliente)
    {
        $cliente->nombres = $this->nombres;
        $cliente->apellidos = $this->apellidos;
        $cliente->tipo_documento = $this->tipoDocumento;
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
        $cliente->foto = '';

        $cliente->estado = 1;
        $cliente->id_rol = $this->idRol;

        $cliente->save();
        $this->closeModal();
    }

    public function updateShowModal($cliente)
    {

        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $cliente['id'];
        $this->loadModel($cliente);
    }

    public function deleteShowModal($id)
    {
    }

    /**
     * Loads the model data
     * of this component.
     * 
     * @return void
     */
    public function loadModel($cliente)
    {
        // $cliente = Cliente::find($this->modelId);
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
        $this->foto = $cliente['foto'];
        $this->modalStyle = 'display:block';
    }

    /**
     * The data for the model mapped
     * in this component.
     * 
     * @return void
     */
    public function modelData()
    {
        return [

            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'tipo_documento' => $this->tipo_documento,
            'nro_documento' => $this->nro_documento,
            'genero' => $this->genero,
            'email' => $this->email,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'celular1' => $this->celular1,
            'celular2' => $this->celular2,
            'direccion' => $this->direccion,
            'estado_civil' => $this->estado_civil,
            'lugar_trabajo' => $this->lugar_trabajo,
            'cargo' => $this->cargo,
            'independiente' => $this->independiente,
            'foto' => $this->foto,
        ];
    }

    /**
     * Resets all the variables
     * to null.
     * 
     * @return void
     */
    public function resetVars()
    {
        $this->modelId = null;
        $this->nombres = null;
        $this->apellidos = null;
        $this->nro_documento = null;
        $this->tipo_documento = null;
        $this->fecha_nacimiento = null;
        $this->genero = null;
        $this->email = null;
        $this->celular1 = null;
        $this->celular2 = null;
        $this->direccion = null;
        $this->estado_civil = null;
        $this->lugar_trabajo = null;
        $this->cargo = null;
        $this->independiente = null;
        $this->foto = null;
    }
}
