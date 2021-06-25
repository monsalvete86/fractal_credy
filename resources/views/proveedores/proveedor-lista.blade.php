<div>
  <div class="form-row">
    <div class="form-group">
      <label for="buscar_proveedor">Buscar</label>
      <input type="text" class="form-control" id="buscar_proveedor" placeholder="Buscar..." wire:model="textSearch">
    </div>
  </div>

  <div class="form-row">

    <div class="form-group">
      <button class="btn btn-outline-primary" wire:click="crearProveedor" data-toggle="modal" data-target="#proveedorModal" >
        {{ __('Crear') }}
      </button>

    </div>

  </div>
  <div class="table-responsive"> 
    <table class="table table-sm table-bordered">
        <thead>
            <tr class="">                                   
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Documento</th>
                <th>Nro Documento</th>
                <th>Celular1</th>
                <th>Celular2</th>
                <th>Direccion</th>
                <th>Correo</th>                
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($proveedores->count())
              @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombres }}</td>
                    <td>{{ $proveedor->apellidos }}</td>
                    <td>{{ $proveedor->tipo_documento }}</td>
                    <td>{{ $proveedor->nro_documento }}</td>
                    <td>{{ $proveedor->celular1 }}</td>
                    <td>{{ $proveedor->celular2 }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->email }}</td>
                    
                    <td class=""> 
                        <button type="button" class="btn btn-sm btn-success mb-1" 
                        data-toggle="modal" data-target="#proveedorModal" 
                        wire:click="actualizarProveedor({{ $proveedor }})">
                            {{ __('Actualizar') }}
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="({{ $proveedor->id }})" type="button"  value="borrar">
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
