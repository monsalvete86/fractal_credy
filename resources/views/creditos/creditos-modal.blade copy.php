<div>
    <div wire:ignore.self style="{{ $modalStyle }}" class="modal " id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos Credito</h5>
                    <button type="button" wire:click="closeModal()" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="@if ($editando) editar() @else crear() @endif">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label>Cliente</label>
                                <select wire:model="cliente" class="form-control text-center">
                                    <option value="Elegir" disabled="">Elegir</option>
                                    @foreach ($clientes as $t)
                                        <option value="{{ $t->id }}">
                                            {{ $t->nombres }} {{ $t->apellidos }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cliente') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="id_deudor">Deudor</label>
                                <input id="id_deudor" class="form-control" type="text" wire:model="id_deudor">
                                @error('id_deudor') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="deudor">Deudor</label>
                                <input id="deudor" class="form-control" type="text" wire:model="deudor">
                                @error('deudor') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <label>Sedes</label>
                                <select wire:model="sede" class="form-control text-center">
                                    <option value="Elegir" disabled="">Elegir</option>
                                    @foreach ($sedes as $s)
                                        <option value="{{ $s->id }}">
                                            {{ $s->sede }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cliente') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cant_cuotas">Cant. Cuotas</label>
                                <input id="cant_cuotas" class="form-control" type="number" wire:model="cant_cuotas">
                                @error('cant_cuotas') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cant_cuotas_pagadas">Cant. Cuotas Pagadas</label>
                                <input id="cant_cuotas_pagadas" class="form-control" type="number"
                                    wire:model="cant_cuotas_pagadas">
                                @error('cant_cuotas_pagadas') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="dia_limite">Dia Limite</label>
                                <input id="dia_limite" class="form-control" type="text" wire:model="dia_limite">
                                @error('dia_limite') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado">Estado</label>
                                <input id="estado" class="form-control" type="text" wire:model="estado">
                                @error('estado') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input id="fecha_inicio" class="form-control" type="date" wire:model="fecha_inicio">
                                @error('fecha_inicio') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="interes_mensual">Interes Mensual</label>
                                <input id="interes_mensual" class="form-control" type="text"
                                    wire:model="interes_mensual">
                                @error('interes_mensual') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="porcent_interes_anual">Porcentaje Interes Anual</label>
                                <input id="pent_interes_anual" class="form-control" type="text"
                                    wire:model="porcent_interes_anual">
                                @error('porcent_interes_anual') <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="porcent_interes_mensual">Porcent Interes Mensual</label>
                                <input id="porcent_interes_mensual" class="form-control" type="text"
                                    wire:model="porcent_interes_mensual">
                                @error('porcent_interes_mensual') <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="usu_crea">Usuario Responsable</label>
                                <input id="usu_crea" class="form-control" type="text" wire:model="usu_crea">
                                @error('usu_crea') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor_cuota">Valor Cuota</label>
                                <input id="valor_cuota" class="form-control" type="text" wire:model="valor_cuota">
                                @error('valor_cuota') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor_credito">Valor Credito</label>
                                <input id="valor_credito" class="form-control" type="text" wire:model="valor_credito">
                                @error('valor_credito') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor_abonado">Valor Abonado</label>
                                <input id="valor_abonado" class="form-control" type="text" wire:model="valor_abonado">
                                @error('valor_abonado') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor_capital">Valor Capital</label>
                                <input id="valor_capital" class="form-control" type="text" wire:model="valor_capital">
                                @error('valor_capital') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor_interes">Valor Interes</label>
                                <input id="valor_interes" class="form-control" type="text" wire:model="valor_interes">
                                @error('valor_interes') <span class="error">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit"
                            class="btn btn-success">{{ $editando ? 'Actualizar' : 'Crear' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('cerrarModal', event => {
        $("#exampleModal").modal('hide');
    })
</script>
