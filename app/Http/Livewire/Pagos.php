<?php

namespace App\Http\Livewire;

use App\Models\Pago;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pagos extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modelId;
    public $tipo_deuda;
    public $id_deuda;
    public $valor_pago;
    public $nro_cuota;
    public $valor_interes;
    public $valor_capital;
    public $id_tercero;
    public $fecha_pago;
    
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [

            'tipo_deuda' => 'required',
            'id_deuda' => 'required',
            'valor_pago' => 'required',
            'nro_cuota' => 'required',
            'valor_interes' => 'required',
            'valor_capital' => 'required',
            'id_tercero' => 'required',
            'fecha_pago' => 'required',
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
        Pago::create($this->modelData());
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
        return Pago::paginate(2);
    }

    public function update()
    {
        $this->validate();
        Pago::find($this->modelId)->update($this->modelData());
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
        $data = Pago::find($this->modelId);
        $this->tipo_deuda = $data->tipo_deuda;
        $this->id_deuda = $data->id_deuda;
        $this->valor_pago = $data->valor_pago;
        $this->nro_cuota = $data->nro_cuota;
        $this->valor_interes = $data->valor_interes;
        $this->valor_capital = $data->valor_capital;
        $this->id_tercero = $data->id_tercero;
        $this->fecha_pago = $data->fecha_pago; 
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

            'tipo_deuda' => $this->tipo_deuda,
            'id_deuda' => $this->id_deuda,
            'valor_pago' => $this->valor_pago,
            'nro_cuota' => $this->nro_cuota,
            'valor_interes' => $this->valor_interes,
            'valor_capital' => $this->valor_capital,
            'id_tercero' => $this->id_tercero,
            'fecha_pago' => $this->fecha_pago,   
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
        $this->tipo_deuda = null;
        $this->id_deuda = null;
        $this->valor_pago = null;
        $this->nro_cuota = null;
        $this->valor_interes = null;
        $this->valor_capital = null;
        $this->id_tercero = null;
        $this->fecha_pago = null; 
    }
   
    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    public function render()
    {
        return view('livewire.pagos', [
            'data' => $this->read(),
        ]);
    }
}
