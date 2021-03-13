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
                    <td>{{ $credito->interes_mensual}}</td>
                    <td>{{ $credito->cant_cuotas}}</td>
                    <td>{{ $credito->cant_cuotas_pagadas}}</td>
                    <td>$5000</td>
                    <th>
                        <x-jet-button wire:click="updateModalCredito({{ $credito->id }})">
                            {{ __('Update') }}
                        </x-jet-button>
                        <!-- Boton eliminar -->
                        <x-jet-button class="btn btn-success" wire:click="createModalCredito">
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
            {{ __('Crear crédito') }} {{ $idCredito }}
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
                <x-jet-label for="interes_mensual" value="{{ _('Interés mensual') }}" />
                <x-jet-input type="number" step="any" id="interes_mensual" class="block mt-1 w-full" wire:model.debounce.800ms="interes_mensual" />
                @error('interes_mensual') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="cant_cuotas" value="{{ _('Nro. Cuotas') }}" />
                <x-jet-input type="number" step="any" id="cant_cuotas" class="block mt-1 w-full" wire:model.debounce.800ms="cant_cuotas" />
                @error('cant_cuotas') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="cant_cuotas_pagadas" value="{{ _('Cuotas pagadas') }}" />
                <x-jet-input type="number" step="any" id="cant_cuotas_pagadas" class="block mt-1 w-full" wire:model.debounce.800ms="cant_cuotas_pagadas" />
                @error('cant_cuotas_pagadas') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="dia_limite" value="{{ _('Día límite de pago') }}" />
                <x-jet-input type="day" step="any" id="dia_limite" class="block mt-1 w-full" wire:model.debounce.800ms="dia_limite" />
                @error('dia_limite') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="deudor" value="{{ _('Deudor') }}" />
                <x-jet-input type="number" step="any" id="deudor" class="block mt-1 w-full" wire:model.debounce.800ms="deudor" />
                @error('deudor') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="fecha_inicio" value="{{ _('Fecha inicio') }}" />
                <x-jet-input type="date" step="any" id="fecha_inicio" class="block mt-1 w-full" wire:model.debounce.800ms="fecha_inicio" />
                @error('fecha_inicio') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="id_sede" value="{{ _('Sede Empresa') }}" />
                <x-jet-input type="number" step="any" id="id_sede" class="block mt-1 w-full" wire:model.debounce.800ms="id_sede" />
                @error('id_sede') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="porcent_interes_anual" value="{{ _('Porcentaje de interés anual') }}" />
                <x-jet-input type="number" step="any" id="porcent_interes_anual" class="block mt-1 w-full" wire:model.debounce.800ms="porcent_interes_anual" />
                @error('porcent_interes_anual') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="porcent_interes_mensual" value="{{ _('Porcentaje de interés mensual') }}" />
                <x-jet-input type="number" step="any" id="porcent_interes_mensual" class="block mt-1 w-full" wire:model.debounce.800ms="porcent_interes_mensual" />
                @error('porcent_interes_mensual') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="usu_crea" value="{{ _('Asesor asignado') }}" />
                <x-jet-input type="number" step="any" id="usu_crea" class="block mt-1 w-full" wire:model.debounce.800ms="usu_crea" />
                @error('usu_crea') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_abonado" value="{{ _('Saldo abonado') }}" />
                <x-jet-input type="number" step="any" id="valor_abonado" class="block mt-1 w-full" wire:model.debounce.800ms="valor_abonado" />
                @error('valor_abonado') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_capital" value="{{ _('Abono Capital') }}" />
                <x-jet-input type="number" step="any" id="valor_capital" class="block mt-1 w-full" wire:model.debounce.800ms="valor_capital" />
                @error('valor_capital') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_cuota" value="{{ _('Valor de cuota') }}" />
                <x-jet-input type="number" step="any" id="valor_cuota" class="block mt-1 w-full" wire:model.debounce.800ms="valor_cuota" />
                @error('valor_cuota') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="valor_interes" value="{{ _('Abono interés') }}" />
                <x-jet-input type="number" step="any" id="valor_interes" class="block mt-1 w-full" wire:model.debounce.800ms="valor_interes" />
                @error('valor_interes') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="estado" value="{{ _('Estado crédito') }}" />
                <x-jet-input type="number" step="any" id="estado" class="block mt-1 w-full" wire:model.debounce.800ms="estado" />
                @error('estado') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
          
        </x-slot>
    </x-jet-dialog-modal>

</div>
