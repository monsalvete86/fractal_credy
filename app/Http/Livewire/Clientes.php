<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Cliente;


class Clientes extends Component
{
    use WithPagination;

    //public properties
    // Variables o propiedades públicas. Campos de table - filas-search-acciones y pagination

    public $nombres, $apellidos, $tipo_documento, $nro_documento, $fecha_nacimiento, $genero, $celular1, $celular2, $direccion, $email, $estado_civil, $lugar_trabajo, $cargo, $independiente, $image;

    public $modalFormVisible = false;
    public $modelId;

    // public $nombres, $apellidos, $tipo_documento, $nro_documento, $fecha_nacimiento, $genero, $celular1, $celular2, $direccion, $estado_civil, $lugar_trabajo, $cargo, $independiente, $foto;

    public $search;




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

    // public $create = 2;
    // public $edit = 2;
    // public $destroy = '';



    /**
     * The create function.
     * 
     * @return void
     */
    public function create()
    {
    }


    //método que se ejecuta después de mount al inciar el componente
    // se ejecuta despues del mount - index - accion principal.
    public function render()
    {
        //si la propiedad buscar tiene al menos un caracter, devolvemos el componente y le inyectamos los registros de una búsqueda con like y paginado a  5 
        if (strlen($this->search) > 0) {
            $info = Cliente::where('description', 'like', '%' .  $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.tipos.component', [
                'info' => $info,
            ]);
        } else {
            // caso contrario solo retornamos el componente inyectado con 5 registros
            return view('livewire.tipos.component', [
                'info' => Cliente::paginate($this->pagination),
            ]);
        }
    }

    // Busquedas con paginación - buscando dentro del paginado - para que no se vaya al inicio o se quede en una pagina.
    //permite la búsqueda cuando se navega entre el paginado
    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }


    // movernos entre formularios-ventanas   -ocultar o mostrar
    //activa la vista edición o creación
    public function doAction($action)
    {
        $this->action = $action;
    }


    // limpiar todas las variables
    //método para reiniciar variables
    private function resetInput()
    {
    }

    // Mostrar la info del registro a editar - Buscar o generar exception que se volcaria en las vistas
    //buscamos el registro seleccionado y asignamos la info a las propiedades
    public function edit($id)
    {
        $record = Cliente::findOrFail($id);
        $this->description = $record->description;
        $this->selected_id = $record->id;
        $this->action = 2;
    }


    //método para registrar y/o actualizar info
    public function StoreOrUpdate()
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


    //escuchar eventos y ejecutar acción solicitada
    protected $listeners = [
        'deleteRow'     => 'destroy',
        'fileUpload' => 'handleFileUpload'
    ];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    // public function render()
    // {
    //     if ($id) { //si es un id válido
    //         $record = Cliente::where('id', $id); //buscamos el registro
    //         $record->delete(); //eliminamos el registro
    //         $this->resetInput(); //limpiamos las propiedades
    //     }
    // }
}
