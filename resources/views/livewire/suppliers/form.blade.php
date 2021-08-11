<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">
            <div class="widget-one">

                <h5>
                    <b>
                    @if ($selected_id == 0) Crear Nuevo Cliente @else Editar
                            Cliente
                        @endif
                    </b>
                </h5>

                @include('common.messages')


                <div class="row">
                    <div class="col-sm-12 col-lg-8 col-md-8  ">
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                <label>Imágen</label>
                                <input type="file" class="form-control text-center" id="image"
                                    wire:change="$emit('fileChoosen',this)" accept="image/x-png, image/gif, image/jpeg">
                            </div>


                            <div class="form-group col-md-4">
                                <label for="nombres">Nombres</label>
                                <input id="nombres" class="form-control" type="text" wire:model="nombres">
                                @error('nombres') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="apellidos">Apellidos</label>
                                <input id="apellidos" class="form-control" type="text"
                                    wire:model.debounce.800ms="apellidos">
                                @error('apellidos') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipo_documento">Tipo de documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="custom-select"
                                    wire:model.debounce.800ms="tipo_documento">
                                    <option value="" disabled>--Seleccionar--</option>
                                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                    <option value="NIT">NIT</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                                @error('tipo_documento') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nro_documento">Nro. Documento</label>
                                <input id="nro_documento" class="form-control" type="text"
                                    wire:model.debounce.800ms="nro_documento">
                                @error('nro_documento') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input id="fecha_nacimiento" class="form-control" type="date"
                                    wire:model.debounce.800ms="fecha_nacimiento">
                                @error('fecha_nacimiento') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="genero">Género</label>
                                <select name="genero" id="genero" class="custom-select"
                                    wire:model.debounce.800ms="genero">
                                    <option value="" disabled>--Seleccionar--</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Sin definir">Sin definir</option>
                                </select>
                                @error('genero') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="celular1">Celular 1</label>
                                <input id="celular1" class="form-control" type="text"
                                    wire:model.debounce.800ms="celular1">
                                @error('celular1') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="celular2">Celular 2</label>
                                <input id="celular2" class="form-control" type="text"
                                    wire:model.debounce.800ms="celular2">
                                @error('celular2') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" type="text"
                                    wire:model.debounce.800ms="direccion">
                                @error('direccion') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado_civil">Estado civíl</label>
                                <select name="estado_civil" id="estado_civil" class="custom-select"
                                    wire:model.debounce.800ms="estado_civil">
                                    <option value="" disabled>--Seleccionar--</option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Union libre">Union libre</option>
                                    <option value="Divorciado">Divorciado</option>
                                </select>
                                @error('estado_civil') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="lugar_trabajo">Lugar de trabajo</label>
                                <input id="lugar_trabajo" class="form-control" type="text"
                                    wire:model.debounce.800ms="lugar_trabajo">
                                @error('lugar_trabajo') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cargo">Cargo</label>
                                <input id="cargo" class="form-control" type="text" wire:model.debounce.800ms="cargo">
                                @error('cargo') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="independiente">Independiente</label>
                                <input id="independiente" class="form-control" type="text"
                                    wire:model.debounce.800ms="independiente">
                                @error('independiente') <span class="error">{{ $message }}</span> @enderror
                            </div>


                            <div class="form-group"></div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                            <div class="form-group"></div>
                        </div>
                    </div>
                    {{-- <div class="form-group col-lg-3 col-md-3 col-sm-12">
                        <label>Imágen</label>
                        <input type="file" class="form-control text-center" id="image"
                            wire:change="$emit('fileChoosen',this)" accept="image/x-png, image/gif, image/jpeg">
                    </div> --}}

                </div>
                <br>

                <button type="button" wire:click="doAction(1)" class="btn btn-dark mr-1">
                    <i class="mbri-left"></i> Regresar
                </button>
                <button type="button" wire:click="StoreOrUpdate() " class="btn btn-primary">
                    <i class="mbri-success"></i> Guardar
                </button>

            </div>
        </div>
    </div>
</div>
