<?php

namespace App\Http\Livewire\Creditos;

use App\Models\Credito;
use App\Models\Cliente;
use App\Models\Sede;
use Livewire\{Component, WithPagination};

class CreditosList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $textSearch = '';

    public $cont = 1;

    protected $listeners = [
        'creditoTableUpdate' => 'render',
        'delete',
    ];

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
    }

    public function updatingTextSearch()
    {
        $this->resetPage();
    }


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
