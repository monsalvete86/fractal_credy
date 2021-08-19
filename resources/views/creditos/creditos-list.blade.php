<div class="table-responsive">
    <div class="form-group row">
        <div class="col-8 col-sm-4">
            <label for="textSearch">Buscar</label>
            <input type="text" wire:model="textSearch" class="form-control" id="textSearch" placeholder="Buscar...">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <button class="btn btn-outline-primary" wire:click="newCredito()" data-toggle="modal"
                data-target="#exampleModal">Nuevo</button>
        </div>
    </div>

    <table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="">
                <th>#</th>
                <th>Cliente</th>
                <th>Deudor</th>
                <th>Valor Credito</th>
                <th>Tasa Interés</th>
                <th>Nro. Cuotas</th>
                <th>Cuotas Pagadas</th>
                <th>Saldo Restante</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $credito)
                <tr>
                    {{-- <td>{{ $cont++ }} </td> --}}
                    <td>{{ $credito->id }}</td>
                    <td>{{ $credito->id_cliente }}</td>
                    <td>{{ $credito->id_deudor }}</td>
                    <td>{{ $credito->valor_credito }}</td>
                    <td>{{ $credito->interes_mensual }}</td>
                    <td>{{ $credito->cant_cuotas }}</td>
                    <td>{{ $credito->cant_cuotas_pagadas }}</td>
                    <td>$5000</td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                            wire:click="showModal({{ $credito }})">
                            <span class="material-icons">create</span>
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete('{{ $credito->id }}')" type="button"
                            value="borrar">
                            {{ __('Eliminar') }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $creditos->links() }}
</div>
@push('scripts')

@endpush
