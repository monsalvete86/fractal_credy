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
    public $editando = null;
    public $modelId;
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
    public $idCliente = '';

    public function render()
    {
        return view('clientes.cliente-modal');
    }

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
        Cliente::create($this->modelData());
        $this->resetVars();
        
    }


    public function update()
    {
        $this->validate();
        Cliente::find($this->modelId)->update($this->modelData());
    }

    /**
     * shows the form modal
     * of the create fuction.
     * 
     * @return void
     */
    public function createShowModal()
    {
        // $this->resetValidation();
        // $this->resetVars();
        $this->modalStyle = 'display:block';
    }

    /**
     * Shows the form model
     * in update mode.
     * 
     * @param mixed $id
     * @return void
     */
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

    public function closeModal() {
        $this->modalStyle = 'display:none';
        $this->reset();
        $this->dispatchBrowserEvent('cerrarModal'); 
    }
   
   
}
