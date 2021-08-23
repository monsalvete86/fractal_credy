<?php

namespace App\Http\Livewire\Creditos;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Credito;
use App\Models\Cliente;
use App\Models\Sede;

class CreditosController extends Component
{
    use WithPagination;


    public $modalStyle = 'display:none';
    private $pagination = 6;

    //properties|
    public $id_cliente;
    public $id_deudor;
    public $id_sede;
    public $cant_cuotas;
    public $cant_cuotas_pagadas;
    public $dia_limite;
    public $deudor;
    public $estado;
    public $fecha_inicio;
    public $interes_mensual;
    public $porcent_interes_anual;
    public $porcent_interes_mensual;
    public $usu_crea;
    public $valor_cuota;
    public $valor_credito;
    public $valor_abonado;
    public $valor_capital;
    public $valor_interes;

    public $editando = null;
    public $cliente = 'Elegir';
    public  $clientes; //Listado de clientes
    public $sede = 'Elegir';
    public $sedes;


    public  $selected_id, $textSearch;                         //para búsquedas y fila seleccionada
    public  $action = 1;                                     //manejo de ventanas

    public function mount()
    {
        // $creditos = Credito::count();
        // // Si tenemos almenos una credito registrada obtnedremos ese registro
        // if ($creditos > 0) {
        //     $credito = Credito::select('jerarquia')->orderBy('jerarquia', 'desc')->first();
        //     $this->jerarquia = $credito->jerarquia + 1;
        //     //dd($credito->jerarquia);
        // } else {
        //     $this->jerarquia = 0;
        // }
    }

    //método que se ejecuta al inciar el componente
    public function render()
    {

        $this->clientes = Cliente::all();
        $this->sedes = Sede::all();

        $creditos = Credito::where(function ($query) {
            $query->select('*')->where('id_cliente', 'like', "$this->textSearch%")
                ->orWhere('id_deudor', 'like', "$this->textSearch%")
                ->orWhere('valor_credito', 'like', "$this->textSearch%");
        });

        $creditos = $creditos->orderBy('id_cliente')->paginate(10);

        return view('creditos.creditos-list', [
            // 'creditos' => $this->read(),
            'creditos' => $creditos,
        ]);

        if (strlen($this->textSearch) > 0) {
            return view('creditos.creditos-modal', [
                'info' => Credito::where('id_cliente', 'like', '%' .  $this->textSearch . '%')
                    ->paginate($this->pagination),
            ]);
        } else {
            $creditos = Credito::leftjoin('clientes as c', 'c.id', 'creditos.id_cliente')
                ->select('creditos.*', 'c.nombres as cliente')
                ->orderBy('creditos.id_cliente', 'desc')
                ->paginate($this->pagination);

            return view('creditos.creditos-modal', [
                'info' => $creditos,
            ]);
        }
    }

    //permite la búsqueda cuando se navega entre el paginado : void para no retornar ningun dato.
    public function updatingtextSearch(): void
    {
        $this->gotoPage(1);
    }


    //método para reiniciar variables
    private function resetInput()
    {
        $this->id_cliente = '';
        $this->tiempo = 'Elegir';
        $this->costo = '';
        $this->cliente = 'Elegir';
        $this->selected_id = null;
        $this->action = 1;
        $this->textSearch = '';
        //$this->jerarquia =null;
    }

    //buscamos el registro seleccionado y asignamos la info a las propiedades
    public function edit($id)
    {
        $record = Credito::findOrFail($id);
        $this->selected_id = $id;
        $this->id_cliente = $record->id_cliente;
        $this->tiempo = $record->tiempo;
        $this->costo = $record->costo;
        $this->cliente = $record->cliente->id;
        $this->id_cliente = $record->id_cliente;
        $this->jerarquia = $record->jerarquia;

        $this->modalStyle = 'display:block';
        $this->action = 2;
    }


    //método para registrar y/o actualizar registros
    public function StoreOrUpdate()
    {

        $this->validate([
            'id_cliente' => 'required',
            'cliente'   => 'not_in:Elegir',
            'id_deudor' => 'required',
            'id_sede' => 'email|required',
            'sede'   => 'not_in:Elegir',
            'cant_cuotas' => 'required',
            'cant_cuotas_pagadas' => 'required',
            'dia_limite' => 'required',
            'deudor' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required',
            'interes_mensual' => 'required',
            'porcent_interes_anual' => 'required',
            'porcent_interes_mensual' => 'required',
            'usu_crea' => 'required',
            'valor_cuota' => 'required',
            'valor_credito' => 'required',
            'valor_abonado' => 'required',
            'valor_capital' => 'required',
            'valor_interes' => 'required',

            'tiempo' => 'required',
            'costo'  => 'required',
            'cliente'   => 'required',
            'tiempo' => 'not_in:Elegir',
            'cliente'   => 'not_in:Elegir'
        ]);


        if ($this->selected_id > 0) {
            $existe = Credito::where('tiempo', $this->tiempo)
                ->where('id_cliente', $this->cliente)
                ->where('id', '<>', $this->selected_id)
                ->select('tiempo')->get();
        } else {
            $existe = Credito::where('tiempo', $this->tiempo)
                ->where('id_cliente', $this->cliente)
                ->select('tiempo')->get();
        }


        if ($existe->count() > 0) {
            session()->flash('msg-error', 'Ya existe la credito');
            $this->resetInput();
            return;
        }




        if ($this->selected_id <= 0) {

            $credito =  Credito::create([
                'tiempo' => $this->tiempo,
                'id_cliente' => $this->id_cliente,
                'costo' => $this->costo,
                'id_cliente' => $this->cliente,
                'jerarquia' => $this->jerarquia
            ]);
        } else {

            $credito = Credito::find($this->selected_id);
            $credito->update([
                'tiempo' => $this->tiempo,
                'id_cliente' => $this->id_cliente,
                'costo' => $this->costo,
                'id_cliente' => $this->cliente,
                'jerarquia' => $this->jerarquia
            ]);
        }
        if ($this->jerarquia == 1) {
            credito::where('id', '<>', $credito->id)->update([
                'jerarquia' => 0
            ]);
        }

        if ($this->selected_id)
            session()->flash('message', 'credito Actualizada');
        else
            session()->flash('message', 'credito Creada');


        $this->resetInput();
    }


    //escuchar eventos y ejecutar acción solicitada
    protected $listeners = [
        'deleteRow'     => 'destroy',
        'showData',
        'showClean'
    ];


    //método para eliminar un registro dado
    // public function destroy($id)
    // {
    //     if ($id) {
    //         $records = Renta::where('credito_id', $id)->count();
    //         if ($records > 0) {
    //             $this->emit('msg-error', "No es posible eliminar el registro porque existen ventas cobradas con esta credito");
    //         } else {
    //             $record = Credito::where('id', $id);
    //             $record->delete();
    //             $this->resetInput();
    //             $this->emit('msgok', "credito eliminada de sistema");
    //         }
    //     }
    // }

    // -------------------------
    public function showModal($credito)
    {
        $this->emit('showData', $credito);
    }

    public function newCredito()
    {
        $this->emit('showClean');
    }


    public function delete($id)
    {
        credito::find($id)->delete();
        session()->flash('message', 'Credito Eliminado.');
        $this->render();
    }
}
