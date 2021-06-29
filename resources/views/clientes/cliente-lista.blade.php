<div>
  <div class="form-row">
    <div class="form-group">
      <label for="buscar_cliente">Buscar</label>
      <input type="text" class="form-control" id="buscar_cliente" placeholder="Buscar..." wire:model="textSearch">
    </div>
  </div>

  <div class="form-row">

    <div class="form-group">
      <button class="btn btn-outline-primary" wire:click="crearCliente" data-toggle="modal" data-target="#clienteModal" >
        {{ __('Crear') }}
      </button>

    </div>

  </div>
  <div class="table-responsive"> 
    <table class="table table-sm table-bordered">
        <thead>
            <tr class="">                                   
                <th>#</th>
                <th>Foto</th>
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
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($clientes->count())
              @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>@if($cliente->foto)  <img src="{{ $cliente->foto }}" class="img-fluid" alt="..."> @endif</td>
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
                    
                    <td class=""> 
                        <button type="button" class="btn btn-sm btn-success mb-1" 
                        data-toggle="modal" data-target="#clienteModal" 
                        wire:click="actualizarCliente({{ $cliente }})">
                            {{ __('Actualizar') }}
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete('{{ $cliente->id }}')" type="button"  value="borrar">
                        {{__('Eliminar') }}
                        </button>    
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
