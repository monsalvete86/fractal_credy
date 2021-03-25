<div class="p-6">
    
    <x-jet-button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" wire:click="pagos">
        {{ __('Filtrar') }}
    </x-jet-button>
    
    <x-jet-button wire:click="createShowModal">
        {{ __('Agregar') }}
    </x-jet-button>
    

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table style=" width: 100%; " class="min-w-full divide-y table">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>#</th>
                                <th>Tipo Deuda</th>
                                <th>Id Deuda</th>
                                <th>Valor Pago</th>
                                <th>Nro Cuota</th>
                                <th>Valor Interes</th>
                                <th>Valor Capital</th>
                                <th>Id Tercero</th>
                                <th>Fecha Pago</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr> 
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->id }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->tipo_deuda }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->id_deuda }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->valor_pago }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->nro_cuota }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->valor_interes }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->valor_capital }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->id_tercero }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->fecha_pago }}</td>
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
            {{ __('Nuevo Pago') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="tipo_deuda" value="Tipo Deuda" />
                <x-jet-input id="tipo_deuda" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="tipo_deuda" />
                @error('tipo_deuda') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="id_deuda" value="Id Deuda" />
                <x-jet-input id="id_deuda" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="id_deuda" />
                @error('id_deuda') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_pago" value="Valor Pago" />
                <x-jet-input id="valor_pago" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="valor_pago" />
                @error('valor_pago') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nro_cuota" value="Nro Cuota" />
                <x-jet-input id="nro_cuota" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="nro_cuota" />
                @error('nro_cuota') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_interes" value="Valor Interes" />
                <x-jet-input id="valor_interes" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="valor_interes" />
                @error('valor_interes') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_capital" value="Valor Capital" />
                <x-jet-input id="valor_capital" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="valor_capital" />
                @error('valor_capital') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="id_tercero" value="Id Tercero" />
                <x-jet-input id="id_tercero" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="id_tercero" />
                @error('id_tercero') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="fecha_pago" value="Fecha Pago" />
                <x-jet-input id="fecha_pago" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="fecha_pago" />
                @error('fecha_pago') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif
            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
