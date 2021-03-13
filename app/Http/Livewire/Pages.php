<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modelId;
    //public $slug;
    //public $title;
    //public $content;
    public $nombre;
    public $apellido;
    public $cedula;
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
    public $search;
    /**
     * The validation rules
     * 
     * @return void
     */
    public function rules()
    {
        return [
            //'title' => 'required',
            //'slug' => ['required', Rule::unique('pages', 'slug')],
            //'content' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular1' => 'required',
            'celular2' => 'required',
            'direccion' => 'required',
            'estado_civil' => 'required',
            'lugar_trabajo' => 'required',
            'cargo' => 'required',
            'independiente' => 'required',
            'foto' => 'required',
        ];
    }

    /**
     * Runs everytime the title
     * variable is updated.
     * 
     * @param mixed $value
     * @return void
     */

    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }
    /**
     * The create function.
     * 
     * @return void
     */
    public function create()
    {
        $this->validate();
        page::created($this->modelData());
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
        return Page::paginate(2);
    }

    public function update()
    {
        $this->validate();
        Page::find($this->modelId)->update($this->modelData());
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

    /**
     * Loads the model data
     * of this component.
     * 
     * @return void
     */
    public function loadModel()
    {
        $data = Page::find($this->modelId);
        //$this->title = $data->title;
        //$this->slug = $data->slug;
        //$this->content = $data->content;
        $this->nombre = $data->nombre;
        $this->apellido = $data->apellido;
        $this->cedula = $data->cedula;
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
            //'title' => $this->title,
            //'slug' => $this->slug,
            //'content' => $this->content,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'cedula' => $this->cedula,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->genero,
            'celular1' => $this->celular1,
            'celular2' => $this->celular2,
            'direccion' => $this->direccion,
            'estado_civil' => $this->estado_civil,
            'lugar_trabajo' => $this->eslugar_trabajo,
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
        //$this->title = null;
        //$this->slug = null;
        //$this->content = null;
        $this->nombre = null;
        $this->apellido = null;
        $this->cedula = null;
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
     * generate a url slug 
     * base on the title. 
     * 
     * @param mixed $value
     * @return void
     */
    private function generateSlug($value)
    {
        $process1 = str_replace('', '-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

    //public $search = 'jorge';

    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
