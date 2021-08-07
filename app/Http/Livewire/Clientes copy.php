<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modelId;
    public $nombres;
    public $apellidos;
    public $tipo_documento;
    public $nro_documento;
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

    //public $search;




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
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    /**
     * The read funtion.
     * 
     * @return void
     */
    public function read()
    {
        return Cliente::paginate(2);
    }

    public function update()
    {
        $this->validate();
        Cliente::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
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
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form model
     * in update mode.
     * 
     * @param mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
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
    public function loadModel()
    {
        $data = Cliente::find($this->modelId);
        $this->nombres = $data->nombres;
        $this->apellidos = $data->apellidos;
        $this->tipo_documento = $data->tipo_documento;
        $this->nro_documento = $data->nro_documento;
        $this->fecha_nacimiento = $data->fecha_nacimiento;
        $this->genero = $data->genero;
        $this->celular1 = $data->celular1;
        $this->celular2 = $data->celular2;
        $this->direccion = $data->direccion;
        $this->estado_civil = $data->estado_civil;
        $this->lugar_trabajo = $data->lugar_trabajo;
        $this->cargo = $data->cargo;
        $this->independiente = $data->independiente;
        $this->foto = $data->foto;
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
        $this->celular1 = null;
        $this->celular2 = null;
        $this->direccion = null;
        $this->estado_civil = null;
        $this->lugar_trabajo = null;
        $this->cargo = null;
        $this->independiente = null;
        $this->foto = null;
    }

    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    public function render()
    {
        return view('livewire.clientes', [
            'clientes' => $this->read(),
        ]);
    }
}
