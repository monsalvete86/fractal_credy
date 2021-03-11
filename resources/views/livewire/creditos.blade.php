<div>
    <div class="container">
        <x-jet-button wire:click="createModalCredito">
            {{ __('Create') }}
        </x-jet-button>
        
        <table class="table ">
            <thead>
                <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Deudor</th>
                    <th>Valor Credito</th>
                    <th>Tasa Interés</th>
                    <th>Nro. Cuotas</th>
                    <th>Cuotas pagadas</th>
                    <th>Saldo restante</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

            @foreach($creditos as $credito)
                <tr>
                    <td>{{ $credito->id}}</td>
                    <td>{{ $credito->id_cliente}}</td>
                    <td>{{ $credito->id_deudor}}</td>
                    <td>$ {{ $credito->valor_credito}}</td>
                    <td>{{ $credito->tasa_interes}}</td>
                    <td>{{ $credito->nro_cuotas}}</td>
                    <td>{{ $credito->nro_cuotas_pagas}}</td>
                    <td>$5000</td>
                    <th>
                        <!-- Boton eliminar -->
                        <x-jet-button class="btn btn-success" wire:click="borrarCredito">
                            <i class="fas fa-trash-alt"></i>{{ __('Delete') }}
                        </x-jet-button>
                    </th>
                </tr>
            @endforeach
                
            </tbody>
        </table>
    </div>

    <x-jet-dialog-modal wire:model="modalCrearCredito">
        <x-slot name="title">
            {{ __('Logout Other Browser Sessions') }}
        </x-slot>

        <x-slot name="content">

            {{--Contenido del modal--}}            
            <div class="mt-4">
                <x-jet-label for="id_cliente" value="{{ _('Cliente') }}" />
                <x-jet-input type="number" step="any" id="id_cliente" class="block mt-1 w-full" wire:model.debounce.800ms="id_cliente" />
                @error('id_cliente') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="id_deudor" value="{{ _('Deudor') }}" />
                <x-jet-input type="number" step="any" id="id_deudor" class="block mt-1 w-full" wire:model.debounce.800ms="id_deudor" />
                @error('id_deudor') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_credito" value="{{ _('Valor de credito') }}" />
                <x-jet-input type="number" step="any" id="valor_credito" class="block mt-1 w-full" wire:model.debounce.800ms="valor_credito" />
                @error('valor_credito') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nro_cuotas" value="{{ _('Cantidad cuotas') }}" />
                <x-jet-input type="number" step="any" id="nro_cuotas" class="block mt-1 w-full" wire:model.debounce.800ms="nro_cuotas" />
                @error('nro_cuotas') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="tasa_interes" value="{{ _('Tasa de Interés') }}" />
                <x-jet-input type="number" step="any" id="tasa_interes" class="block mt-1 w-full" wire:model.debounce.800ms="tasa_interes" />
                @error('tasa_interes') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="nro_cuotas_pagas" value="{{ _('Cuotas pagadas') }}" />
                <x-jet-input type="number" step="any" id="nro_cuotas_pagas" class="block mt-1 w-full" wire:model.debounce.800ms="nro_cuotas_pagas" />
                @error('nro_cuotas_pagas') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
          
        </x-slot>
    </x-jet-dialog-modal>

</div>
