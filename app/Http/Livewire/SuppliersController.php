<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Supplier;

class SuppliersController extends Component
{
    use WithPagination;

    //public properties
    // Variables o propiedades públicas. Campos de table - filas-search-acciones y pagination
    public $nombres, $apellidos, $tipo_documento, $nro_documento, $fecha_nacimiento, $genero, $celular1, $celular2, $direccion, $email, $estado_civil, $lugar_trabajo, $cargo, $independiente, $image;

    public  $selected_id, $search;   //para búsquedas y fila seleccionada
    public  $action = 1;             //manejo de ventanas - movernos entre formularios editar o crear
    protected $paginationTheme = 'bootstrap';
    private $pagination = 10;         //paginación de tabla

    // public $create = 2;
    // public $edit = 2;
    // public $destroy = '';


    //primer método que se ejecuta al inicializar el componente
    // El primero en ejecutarse al renderizar el componente o iniciarse, sirve por ejemplo para cuando se crea la instancia de este controller nosotros en el mount poder definir variables ocn su información 
    public function mount()
    {
    }


    //método que se ejecuta después de mount al inciar el componente
    // se ejecuta despues del mount - index - accion principal.
    public function render()
    {
        //si la propiedad buscar tiene al menos un caracter, devolvemos el componente y le inyectamos los registros de una búsqueda con like y paginado a  5 
        if (strlen($this->search) > 0) {
            $info = Supplier::where('nro_documento', 'like', '%' .  $this->search . '%')
                ->orWhere('nombres', 'like', '%' .  $this->search . '%')
                ->orWhere('apellidos', 'like', '%' .  $this->search . '%')
                ->orWhere('tipo_documento', 'like', '%' .  $this->search . '%')
                ->paginate($this->pagination);
            return view('livewire.suppliers.component', [
                'info' => $info,
            ]);
        } else {
            // caso contrario solo retornamos el componente inyectado con 5 registros
            // $info = Supplier::pagination($this->pagination)->orderBy('id', 'DESC');

            return view('livewire.suppliers.component', [
                'info' => Supplier::paginate($this->pagination),
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
        $this->nombres = '';
        $this->apellidos = '';
        $this->tipo_documento = '';
        $this->nro_documento = '';
        $this->fecha_nacimiento = '';
        $this->genero = '';
        $this->celular1 = '';
        $this->celular2 = '';
        $this->direccion = '';
        $this->email = '';
        $this->estado_civil = '';
        $this->lugar_trabajo = '';
        $this->cargo = '';
        $this->independiente = '';
        $this->image = '';

        $this->selected_id = null;
        $this->action = 1;
        $this->search = '';
    }

    // Mostrar la info del registro a editar - Buscar o generar exception que se volcaria en las vistas
    //buscamos el registro seleccionado y asignamos la info a las propiedades
    public function edit($id)
    {
        $record = Supplier::findOrFail($id);
        $this->nombres = $record->nombres;
        $this->apellidos = $record->apellidos;
        $this->tipo_documento = $record->tipo_documento;
        $this->nro_documento = $record->nro_documento;
        $this->fecha_nacimiento = $record->fecha_nacimiento;
        $this->genero = $record->genero;
        $this->celular1 = $record->celular1;
        $this->celular2 = $record->celular2;
        $this->direccion = $record->direccion;
        $this->email = $record->email;
        $this->estado_civil = $record->estado_civil;
        $this->lugar_trabajo = $record->lugar_trabajo;
        $this->cargo = $record->cargo;
        $this->independiente = $record->independiente;
        $this->image = $record->image;
        $this->selected_id = $record->id;
        $this->action = 2;
    }


    //método para registrar y/o actualizar info
    public function StoreOrUpdate()
    {
        //validación campos requeridos
        $this->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'nro_documento' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular1' => 'required|min:10',
            'celular2' => 'required|min:10',
            'direccion' => 'required',
            'email' => 'required',
            'estado_civil' => 'required',
            'lugar_trabajo' => 'required',
            'cargo' => 'required',
            'independiente' => 'required',
            // 'image' => 'required'
        ]);

        //valida si existe otro registro con el mismo valor (edicion de clientes)
        if ($this->selected_id > 0) {
            $existe = Supplier::where('nro_documento', $this->nro_documento)
                ->where('id', '<>', $this->selected_id)
                ->select('nro_documento')
                ->get();

            if ($existe->count() > 0) {
                session()->flash('msg-error', 'Ya existe el Cliente con este Nro. de Documento');
                $this->resetInput();
                return;
            }
        } else {
            $existe = Supplier::where('nro_documento', $this->nro_documento)
                ->select('nro_documento')
                ->get();

            if ($existe->count() > 0) {
                session()->flash('msg-error', 'Ya existe el Cliente con este Nro. de Documento');
                $this->resetInput();
                return;
            }
        }









        // Creando registro
        if ($this->selected_id <= 0) {
            //creamos el registro
            // $this->resetInput();
            $record =  Supplier::create([

                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'tipo_documento' => $this->tipo_documento,
                'nro_documento' => $this->nro_documento,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'celular1' => $this->celular1,
                'celular2' => $this->celular2,
                'direccion' => $this->direccion,
                'email' => $this->email,
                'estado_civil' => $this->estado_civil,
                'lugar_trabajo' => $this->lugar_trabajo,
                'cargo' => $this->cargo,
                'independiente' => $this->independiente,
                'image' => $this->image
            ]);
            return view('livewire.suppliers.component', [
                'info' => Supplier::paginate($this->pagination),
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
        } else {
            //buscamos el registro
            $record = Supplier::find($this->selected_id);
            //actualizamos el registro
            $record->update([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'tipo_documento' => $this->tipo_documento,
                'nro_documento' => $this->nro_documento,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero' => $this->genero,
                'celular1' => $this->celular1,
                'celular2' => $this->celular2,
                'direccion' => $this->direccion,
                'email' => $this->email,
                'estado_civil' => $this->estado_civil,
                'lugar_trabajo' => $this->lugar_trabajo,
                'cargo' => $this->cargo,
                'independiente' => $this->independiente,
                'image' => $this->image
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
            return view('livewire.suppliers.component', [
                'info' => Supplier::paginate($this->pagination),
            ]);
        }


        //enviamos feedback al usuario
        if ($this->selected_id)
            session()->flash('message', 'Cliente Actualizado');
        else
            session()->flash('message', 'Cliente Creado');

        //limpiamos las propiedades
        $this->resetInput();
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


    //método para eliminar un registro dado
    public function destroy($id)
    {
        if ($id) { //si es un id válido
            $record = Supplier::where('id', $id); //buscamos el registro
            $record->delete(); //eliminamos el registro
            $this->resetInput(); //limpiamos las propiedades
        }
    }
}
