<div>
  <div class="table-responsive"> 
    <table class="table table-sm table-bordered">
        <thead>
            <tr class="">                                   
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th>Nro Documento</th>
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
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($clientes->count())
              @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->tipo_documento }}</td>
                    <td>{{ $cliente->nro_documento }}</td>
                    <td>{{ $cliente->fecha_nacimiento }}</td>
                    <td>{{ $cliente->genero }}</td>
                    <td>{{ $cliente->celular1 }}</td>
                    <td>{{ $cliente->celular2 }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->estado_civil }}</td>
                    <td>{{ $cliente->lugar_trabajo }}</td>
                    <td>{{ $cliente->cargo }}</td>
                    <td>{{ $cliente->independiente }}</td>
                    <td><img src="{{ $cliente->foto }}" class="img-fluid" alt="..."></td>
                    <td class=""> 
                        <x-jet-button class="btn btn-sm btn-success mb-1" wire:click="updateShowModal({{ $cliente->id }})">
                            {{ __('Update') }}
                        </x-jet-button>
                        <x-jet-button class="btn btn-sm btn-danger" wire:click="({{ $cliente->id }})" type="button"  value="borrar">
                        {{__('Delete') }}
                        </x-jet-button>    
                    </td> 
                </tr>
              @endforeach
            @else 
              <tr>
                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
              </tr>
            @endif
        </tbody>
    </table>
  </div>
</div>
