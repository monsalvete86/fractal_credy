<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ClienteModal extends Component

{
    public $modalFormVisible = false;
    public  $selected_id, $search;   //para búsquedas y fila seleccionada
    public  $action = 1;             //manejo de ventanas - movernos entre formularios editar o crear
    protected $paginationTheme = 'bootstrap';
    private $pagination = 1;

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
    public $image;

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
            'email' => 'required',
            'estado_civil' => 'required',
            'lugar_trabajo' => 'required',
            'cargo' => 'required',
            'independiente' => 'required',
            // 'image' => 'required',
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
        $this->tipo_documento = $cliente['culular2'];
        $this->documento = $cliente['direccion'];
        $this->email = $cliente['email'];
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
        $this->dispatchBrowserEvent('cerrarModal');
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param mixed $value
     * @return void
     */

    // public function updatedNombre($value)
    // {
    //     $this->generateSearch($value);
    // }


    /**
     * The create function.
     *
     * @return void
     */
    // public function create()
    // {
    //     $this->validate();
    //     Cliente::create($this->modelData());
    //     $this->resetVars();
    // }



    // -----------------------------------
    // limpiar todas las variables
    //método para reiniciar variables
    private function resetInput()
    {
        $this->validate();
        $newCliente = new Cliente;
        $this->cargarData($newCliente);
        // Cliente::create($this->modelData());
        // $this->resetVars();
    }


    //método para registrar y/o actualizar info
    public function StoreOrUpdate()
    {
        //validación campos requeridos
        $this->validate([
            // 'nro_documento' => 'required|min:4' //validamos que descripción no sea vacío o nullo y que tenga al menos 4 caracteres
            'nro_documento' => 'required',
            // 'nombres' => 'required',
            // 'nro_documento' => 'required',
            // 'apellidos' => 'required',
            // 'tipo_documento' => 'required',
            // 'nro_documento' => 'required',
            // 'fecha_nacimiento,' => 'required',
            // 'genero' => 'required',
            // 'celular1' => 'required',
            // 'celular2' => 'required',
            // 'direccion' => 'required',
            // 'email' => 'required',
            // 'estado_civil' => 'required',
            // 'lugar_trabajo' => 'required',
            // 'cargo' => 'required',
            // 'independiente' => 'required',
            // 'image' => 'required'
        ]);

        //valida si existe otro cajón con el mismo nombre (edicion de tipos)
        if ($this->selected_id > 0) {
            $existe = Cliente::where('nro_documento', $this->nro_documento)
                ->where('id', '<>', $this->selected_id)
                ->select('nro_documento')
                ->get();

            if ($existe->count() > 0) {
                session()->flash('msg-error', 'Ya existe el Tipo');
                $this->resetInput();
                return;
            }
        } else {
            //valida si existe otro cajón con el mismo nombre (nuevos registros)
            $existe = Cliente::where('nro_documento', $this->nro_documento)
                ->select('nro_documento')
                ->get();

            if ($existe->count() > 0) {
                session()->flash('msg-error', 'Ya existe el Tipo');
                $this->resetInput();
                return;
            }
        }

        if ($this->selected_id <= 0) {
            //creamos el registro
            $tipo =  Cliente::create([
                'nombres' => $this->nombres,
                'nro_documento' => $this->nro_documento,
                'apellidos' => $this->apellidos,
                'tipo_documento' => $this->tipo_documento,
                'nro_documento' => $this->nro_documento,
                'fecha_nacimiento,' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'celular1' => $this->celular1,
                'celular2' => $this->celular2,
                'direccion' => $this->direccion,
                'email' => $this->email,
                'estado_civil' => $this->estado_civil,
                'lugar_trabajo' => $this->lugar_trabajo,
                'cargo' => $this->cargo,
                'independiente' => $this->independiente,
                // 'image' => $this->lugar_trabajo
            ]);

            // echo "<pre>";
            // print_r($tipo);
            // echo "</pre>";
            // exit;
            if ($this->image) {
                $image = $this->image;
                $fileName = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $moved = \Image::make($image)->save('images/' . $fileName);

                if ($moved) {
                    $tipo->imagen = $fileName;
                    $tipo->save();
                }
            }
        } else {
            //buscamos el tipo
            $record = Cliente::find($this->selected_id);
            //actualizamos el registro
            $record->update([
                'nombres' => $this->nombres,
                'nro_documento' => $this->nro_documento,
                'apellidos' => $this->apellidos,
                'tipo_documento' => $this->tipo_documento,
                'nro_documento' => $this->nro_documento,
                'fecha_nacimiento,' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'celular1' => $this->celular1,
                'celular2' => $this->celular2,
                'direccion' => $this->direccion,
                'email' => $this->email,
                'estado_civil' => $this->estado_civil,
                'lugar_trabajo' => $this->lugar_trabajo,
                'cargo' => $this->cargo,
                'independiente' => $this->independiente,
                // 'image' => $this->lugar_trabajo
            ]);
            if ($this->image) {
                $image = $this->image;
                $fileName = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $moved = \Image::make($image)->save('images/' . $fileName);

                if ($moved) {
                    $record->imagen = $fileName;
                    $record->save();
                }
            }
        }


        //enviamos feedback al usuario
        if ($this->selected_id)
            session()->flash('message', 'Tipo Actualizado');
        else
            session()->flash('message', 'Tipo Creado');

        //limpiamos las propiedades
        $this->resetInput();
    }
    // -----------------------------------
    // public function update()
    // {
    //     $this->validate();
    //     Cliente::find($this->modelId)->update($this->modelData());
    // }


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
        $cliente->image = '';

        // $this->estado = 1;

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
        $this->image = $cliente['image'];
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
            'image' => $this->image,
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
        $this->image = null;
    }
}
