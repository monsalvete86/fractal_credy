<div class="p-12 ">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal" class="btn-primary">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6">
            <div class="py-2 aling-middle inline-block min-w-full">
                <div class=" overflow-hidden border-b">
                    
                    <table style=" width: 100%; " class="min-w-full divide-y table">
                        <thead>
                            <tr>
                                <!--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Title</th>-->
                                <!--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Link</th>-->
                                <!--<th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Content</th>-->
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Nombre</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Apellido</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Cedula</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Fecha_Nacimiento</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Edad</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Sexo</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Celular1</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Celular2</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Direccion</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase ">Estado_civil</th>
                                <th style="background-color: rgb(41, 37, 37)" class="px-6 py-3 text-white text-left text-xs leading-4 font-medium  uppercase "></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <!--<td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->title }}</td>-->
                                        <!--<td class="px-6 py-4 text-sm whitespace-no-wrap">dummy link</td>-->
                                        <!--<td class="px-6 py-4 text-sm whitespace-no-wrap">{!! $item-> content !!}</td>-->
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">andres</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">gutierres</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">1123314566</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">12/09/1965</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">42</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">hombre</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">3135446755</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">3146778844</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">cra/12-34 65</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">soltero</td>
                                        <td class="px-6 py-4 text-right text-sm"> 
                                            <x-jet-button class="btn btn-primary" wire:click="updateShowModal({{ $item->id }})">
                                                {{ __('Update') }}
                                            </x-jet-button>
                                            <input type="button" onclick="test()" value="ss"> 
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
    

    <br/>
    {{ $data->links() }}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Page') }} {{ $modelId }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ _('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="nombre" wire:model.debounce.800ms="nombre" />
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="title" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="title" value="{{ _('Slug') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-gray-300  text-sm">
                        http://localhost:8000/
                    </span>
                    <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                </div> 
                @error('slug') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
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
