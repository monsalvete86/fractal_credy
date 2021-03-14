<div class="p-12 ">

    {{-- The cliente table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto">
            <div class="py-2 aling-middle inline-block min-w-full">
                <div class=" overflow-hidden border-b">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-11">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            </div>
                            <div class="col-sm-1">
                                <x-jet-button wire:click="createShowModal" class="btn-primary" style="margin-left: 477px;">
                                    {{ __('Create') }}
                                </x-jet-button>
                            </div>
                        </div>
                        <br>
                        <table style=" width: 100%; " class="min-w-full divide-y table">
                            <thead>
                                <tr>
                                    {{--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Title</th>--}}
                                    {{--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Link</th>--}}
                                    {{--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Content</th>--}}
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">#</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Nombre</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Apellido</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Cedula</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Fecha_Nacimiento</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Genero</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Celular1</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Celular2</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Direccion</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Estado_civil</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Lugar_Trabajo</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Cargo</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Independiente</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Foto</th>
                                    <th style="background-color: rgb(10, 65, 97)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase "></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @if ($clientes->count())
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->id }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->nombres }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->apellidos }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->cedula }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->fecha_nacimiento }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->genero }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->celular1 }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->celular2 }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->direccion }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->estado_civil }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->lugar_trabajo }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->cargo }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $cliente->independiente }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap"><img src="{{ $cliente->foto }}" class="img-fluid" alt="..."></td>
                                            <td class="px-6 py-4 text-right text-sm"> 
                                                <x-jet-button class="btn btn-primary" wire:click="updateShowModal({{ $cliente->id }})">
                                                    {{ __('Update') }}
                                                </x-jet-button>
                                                <input type="button" onclick="test()" value="borrar"> 
                                                <x-jet-button class="btn btn-danger" click="test()">
                                                Borrar
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
    {{ $clientes->links() }}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Crear_Cliente') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">           

            <div class="mt-4">
                <x-jet-label for="nombres" value="{{ _('Nombre') }}" />
                <x-jet-input id="nombres" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="nombres" />
                @error('nombres') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidos" value="{{ _('Apellido') }}" />
                <x-jet-input id="apellidos" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="apellidos" />
                @error('apellidos') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="tipo_documento" value="{{ _('Tipo documento') }}" />
                <select name="tipo_documento" id="tipo_documento" wire:model.debounce.800ms="tipo_documento">
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
    {{--
    <x-jet-dialog-modal wire:model="modalComfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Navermind') }}
            </x-jet-secondary-button>

            
        </x-slot>
    </x-jet-dialog-modal>--}}
</div>

<script>
  //const Swal = require('sweetalert2')
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
