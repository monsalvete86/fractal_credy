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
<<<<<<< HEAD
    public $modelId;

    public $nombres, $apellidos, $tipo_documento, $nro_documento, $fecha_nacimiento, $genero, $celular1, $celular2, $direccion, $estado_civil, $lugar_trabajo, $cargo, $independiente, $foto;

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
=======
    public  $selected_id, $search;   //para búsquedas y fila seleccionada
    public  $action = 1;             //manejo de ventanas - movernos entre formularios editar o crear
    protected $paginationTheme = 'bootstrap';
    private $pagination = 1;         //paginación de tabla  
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5

    // public $create = 2;
    // public $edit = 2;
    // public $destroy = '';


<<<<<<< HEAD

    /**
     * The create function.
     * 
     * @return void
     */
    public function create()
=======
    //primer método que se ejecuta al inicializar el componente
    // El primero en ejecutarse al renderizar el componente o iniciarse, sirve por ejemplo para cuando se crea la instancia de este controller nosotros en el mount poder definir variables ocn su información 
    public function mount()
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5
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
<<<<<<< HEAD
=======
        $this->description = '';
        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5
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
<<<<<<< HEAD
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
=======
        //validación campos requeridos
        $this->validate([
            'description' => 'required|min:4' //validamos que descripción no sea vacío o nullo y que tenga al menos 4 caracteres
        ]);

        //valida si existe otro cajón con el mismo nombre (edicion de tipos)
        if ($this->selected_id > 0) {
            $existe = Cliente::where('description', $this->description)
                ->where('id', '<>', $this->selected_id)
                ->select('description')
                ->get();

            if ($existe->count() > 0) {
                session()->flash('msg-error', 'Ya existe el Tipo');
                $this->resetInput();
                return;
            }
        } else {
            //valida si existe otro cajón con el mismo nombre (nuevos registros)
            $existe = Cliente::where('description', $this->description)
                ->select('description')
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
                'description' => $this->description
            ]);
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
                'description' => $this->description
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
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5
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

<<<<<<< HEAD
    /**
     * the livewire render fuction.
     * 
     * @return void
     */
    public function render()
=======

    //método para eliminar un registro dado
    public function destroy($id)
>>>>>>> 39922ec0d81bc7fa8bd98e5da7da86f7bd39c5b5
    {
        if ($id) { //si es un id válido
            $record = Cliente::where('id', $id); //buscamos el registro
            $record->delete(); //eliminamos el registro
            $this->resetInput(); //limpiamos las propiedades
        }
    }
}
