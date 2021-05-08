<div>

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

    {{-- The cliente table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">    
                    <div class="table-responsive"> 
                           
                        <table class="table table-sm">
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
                                                <x-jet-button class="btn btn-block btn-sm btn-primary mb-1" wire:click="updateShowModal({{ $cliente->id }})">
                                                    {{ __('Update') }}
                                                </x-jet-button>
                                                <x-jet-button class="btn btn-block btn-sm btn-danger" wire:click="({{ $cliente->id }})" type="button"  value="borrar">
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
            </div>
        </div>
    </div>
    
    <br/>
    
    {{$clientes->links()}}
    
    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible" maxWidth="lg">
        <x-slot name="title">
           
            {{ __('CrearCliente') }} {{ $modelId }}
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
                <x-jet-label for="fecha_nacimiento" value="{{ _('Fecha nacimiento') }}" />
                <x-jet-input id="fecha_nacimiento" type="date" class="block mt-1 w-full"  wire:model.debounce.800ms="fecha_nacimiento" />
                @error('fecha_nacimiento') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="genero" value="{{ _('Genero') }}" />
                <x-jet-input id="genero" class="block mt-1 w-full" type="genero" wire:model.debounce.800ms="genero" />
                @error('genero') <span class="error">{{ $message }}</span> @enderror
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
                <x-jet-label for="estado_civil" value="{{ _('Estado civil') }}" />
                <x-jet-input id="estado_civil" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="estado_civil" />
                @error('estado_civil') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="lugar_trabajo" value="{{ _('Lugar_Trabajo') }}" />
                <x-jet-input id="lugar_trabajo" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="lugar_trabajo" />
                @error('lugar_trabajo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="cargo" value="{{ _('Cargo') }}" />
                <x-jet-input id="cargo" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="cargo" />
                @error('cargo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="independiente" value="{{ _('¿Es usted un empleado independiente?') }}" />

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="independiente" name="idependiente" value="Si" />
                        <label class="custom-control-label" for="independiente">
                            {{ __('Si') }}
                        </label>
                    </div>
                </div>

                @error('independiente') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="formFileSm" class="form-label" value="{{ _('Foto') }}" />
                <x-jet-input id="formFileSm" class="form-control"  type="file" wire:model.debounce.800ms="foto" />
                @error('foto') <span class="error">{{ $message }}</span> @enderror
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

    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
     <x-slot name="title">
            {{ __('Crear crédito') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

<script>

function test(){
    Swal.fire({
        title: 'Estas seguro?',
        text: "Estas seguro de inactivar este cliente!",
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
