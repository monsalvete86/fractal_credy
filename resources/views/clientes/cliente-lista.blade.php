<div class="table-responsive">
    <div class="form-group row">
        <div class="col-8 col-sm-4">
            <label for="textSearch">Buscar</label>
            <input type="text" wire:model="textSearch" class="form-control" id="textSearch" placeholder="Buscar...">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <button class="btn btn-outline-primary" wire:click="newCliente()" data-toggle="modal"
                data-target="#exampleModal">Nuevo</button>
        </div>
    </div>

    <table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="">
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th>Nro Documento</th>
                <th>Email</th>
                <th>Fecha Nacimiento</th>
                <th>Genero</th>
                <th>Celular1</th>
                <th>Celular2</th>
                <th>Direccion</th>
                <th>Estado civil</th>
                <th>Lugar Trabajo</th>
                <th>Cargo</th>
                <th>Independiente</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    {{-- <td>{{ $cont++ }} </td> --}}
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->tipo_documento }}</td>
                    <td>{{ $cliente->nro_documento }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->fecha_nacimiento }}</td>
                    <td>{{ $cliente->genero }}</td>
                    <td>{{ $cliente->celular1 }}</td>
                    <td>{{ $cliente->celular2 }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->estado_civil }}</td>
                    <td>{{ $cliente->lugar_trabajo }}</td>
                    <td>{{ $cliente->cargo }}</td>
                    <td>{{ $cliente->independiente }}</td>
                    <td>
                        @if ($cliente->image) <img src="{{ $cliente->image }}"
                                class="img-fluid" alt="..."> @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#exampleModal"
                            wire:click="showModal({{ $cliente }})">
                            <span>Actualizar</span>
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete('{{ $cliente->id }}')" type="button"
                            value="borrar">
                            {{ __('Eliminar') }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>
@push('scripts')

@endpush
