<div>
    <div class="container">
        <div class="row mb-1">
            <div class="col-sm-2">
                <x-jet-button wire:click="createShowModal" class="btn-success btn-block">
                    {{ __('Crear') }}
                </x-jet-button>
            </div>
            <div class="col-sm-10">
                <input  wire:change ="searchShowModal" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
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
                @if (isset($proveedores) && $proveedores->count())
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
                            <td>{{ $proveedor->correo }}</td>
                            <td class="">
                                <x-jet-button class="btn btn-sm btn-success mb-1" wire:click="updateShowModal({{ $proveedor->id }})">
                                    {{ __('Update') }}
                                </x-jet-button>
                                <x-jet-button class="btn btn-sm btn-danger" wire:click="({{ $proveedor->id }})" type="button"  value="borrar">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
        </nav>
    </div>

    {{$proveedores->links()}}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible" maxWidth="lg">
        <x-slot name="title">
            
            {{ __('CrearProveedor') }} {{ $modelId }}
        </x-slot>
  
        <x-slot name="content">           
  
            <div class="mt-4">
                <x-jet-label for="nombres" value="{{ _('Nombre') }}" />
                <x-jet-input id="nombres" class="block mt-1 w-full" type="text" wire:model="nombres" />
                @error('nombres') <span class="error">{{ $message }}</span> @enderror
            </div>
  
            <div class="mt-4">
                <x-jet-label for="apellidos" value="{{ _('Apellido') }}" />
                <x-jet-input id="apellidos" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="apellidos" />
                @error('apellidos') <span class="error">{{ $message }}</span> @enderror
            </div>
  
            <div class="mt-4">
                <x-jet-label for="tipo_documento" value="{{ _('Tipo documento') }}" />
                <select name="tipo_documento" id="tipo_documento" class="custom-select" wire:model.debounce.800ms="tipo_documento">
                    <option value="" disabled>--Seleccionar--</option>
                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                    <option value="NIT">NIT</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value=""></option>                  
                </select>
                @error('tipo_documento') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nro_documento" value="{{ _('Nro Documento') }}" />
                <x-jet-input id="nro_documento" class="block mt-1 w-full" type="number" wire:model.debounce.800ms="nro_documento" />
                @error('nro_documento') <span class="error">{{ $message }}</span> @enderror
            </div>
  
            <div class="mt-4">
                <x-jet-label for="celular1" value="{{ _('Celular1') }}" />
                <x-jet-input id="celular1" class="block mt-1 w-full" type="number" wire:model.debounce.800ms="celular1" />
                @error('celular1') <span class="error">{{ $message }}</span> @enderror
            </div>
  
            <div class="mt-4">
                <x-jet-label for="celular2" value="{{ _('Celular2') }}" />
                <x-jet-input id="celular2" class="block mt-1 w-full" type="number" wire:model.debounce.800ms="celular2" />
                @error('celular2') <span class="error">{{ $message }}</span> @enderror
            </div>
  
            <div class="mt-4">
                <x-jet-label for="direccion" value="{{ _('Direccion') }}" />
                <x-jet-input id="direccion" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="direccion" />
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ _('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="email" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>
  
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
  
            @if ($modelId)
                <x-jet-button  class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button  class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif
  
        </x-slot>
      </x-jet-dialog-modal>
</div>
<script>
    function test(){
        Swal.fire({
            title: 'Estas seguro?',
            text: "Estas seguro de inactivar este proveedor!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'danger',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, inactivar!',
            cancelButtonText: 'No, cancelar'
        })
        .then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Inactivado!',
                'Inactivado correctamente.',
                ''
                )
            }  
        }) 
    }
    
    </script>
    