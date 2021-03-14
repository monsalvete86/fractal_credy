<div class="p-12 ">

    {{-- The data table --}}
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
                                @if ($data->count())
                                    @foreach ($data as $item)
                                        <tr>
                                            {{--<td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->title }}</td>--}}
                                            {{--<td class="px-6 py-4 text-sm whitespace-no-wrap">dummy link</td>--}}
                                            {{--<td class="px-6 py-4 text-sm whitespace-no-wrap">{!! $item-> content !!}</td>--}}
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->id }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->nombre }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->apellido }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->cedula }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->fecha_nacimiento }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->genero }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->celular1 }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->celular2 }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->direccion }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->estado_civil }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->lugar_trabajo }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->cargo }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->independiente }}</td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap"><img src="{{ $item->foto }}" class="img-fluid" alt="..."></td>
                                            <td class="px-6 py-4 text-right text-sm"> 
                                                <x-jet-button class="btn btn-primary" wire:click="updateShowModal({{ $item->id }})">
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
    {{ $data->links() }}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Crear_Cliente') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            {{--<div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>--}}

            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ _('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="nombre" wire:model.debounce.800ms="nombre" />
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="apellido" value="{{ _('Apellido') }}" />
                <x-jet-input id="apellido" class="block mt-1 w-full" type="apellido" wire:model.debounce.800ms="apellido" />
                @error('apellido') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="cedula" value="{{ _('Cedula') }}" />
                <x-jet-input id="cedula" class="block mt-1 w-full" type="cedula" wire:model.debounce.800ms="cedula" />
                @error('cedula') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="fecha_nacimiento" value="{{ _('Fecha_Nacimiento') }}" />
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
                <x-jet-input id="celular1" class="block mt-1 w-full" type="celular1" wire:model.debounce.800ms="celular1" />
                @error('celular1') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="celular2" value="{{ _('Celular2') }}" />
                <x-jet-input id="celular2" class="block mt-1 w-full" type="celular2" wire:model.debounce.800ms="celular2" />
                @error('celular2') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="direccion" value="{{ _('Direccion') }}" />
                <x-jet-input id="direccion" class="block mt-1 w-full" type="direccion" wire:model.debounce.800ms="direccion" />
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="estado_civil" value="{{ _('Estado_Civil') }}" />
                <x-jet-input id="estado_civil" class="block mt-1 w-full" type="estado_civil" wire:model.debounce.800ms="estado_civil" />
                @error('estado_civil') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="lugar_trabajo" value="{{ _('Lugar_Trabajo') }}" />
                <x-jet-input id="lugar_trabajo" class="block mt-1 w-full" type="lugar_trabajo" wire:model.debounce.800ms="lugar_trabajo" />
                @error('lugar_trabajo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="cargo" value="{{ _('Cargo') }}" />
                <x-jet-input id="cargo" class="block mt-1 w-full" type="cargo" wire:model.debounce.800ms="cargo" />
                @error('cargo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="independiente" value="{{ _('Independiente') }}" />
                <x-jet-input id="independiente" class="block mt-1 w-full" type="independiente" wire:model.debounce.800ms="independiente" />
                @error('independiente') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="formFileSm" class="form-label" value="{{ _('Foto') }}" />
                <x-jet-input id="formFileSm" class="form-control"  type="file" wire:model.debounce.800ms="foto" />
                @error('foto') <span class="error">{{ $message }}</span> @enderror
            </div>


            {{--<div class="mt-4">
                <x-jet-label for="title" value="{{ _('Slug') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-gray-300  text-sm">
                        http://localhost:8000/
                    </span>
                    <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                </div> 
                @error('slug') <span class="error">{{ $message }}</span> @enderror
            </div>--}}
            {{--<div class="mt-4">
                <x-jet-label for="title" value="{{ _('Content') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1">
                        <div class="body-content" wire:ignore>
                            <trix-editor
                                class="trix-content"
                                x-ref="trix"
                                wire:model.debounce.100000ms="content"
                                wire:key="trix-content-unique-key">
                            </trix-editor>
                        </div>
                    </div>
                </div>
                @error('content') <span class="error">{{ $message }}</span> @enderror
            </div>--}}       
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
