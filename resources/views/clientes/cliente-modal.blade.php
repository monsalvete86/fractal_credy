<div>
  
  <div wire:ignore.self style="{{$modalStyle}}" class="modal " id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="clienteModalLabel">Datos Cliente</h5>
          <button type="button" wire:click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form>
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="nombres">Nombres</label>
                  <input id="nombres" class="form-control" type="text" wire:model="nombres">  
                @error('nombres') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="apellidos">Apellidos</label>
                <input id="apellidos" class="form-control" type="text" wire:model.debounce.800ms="apellidos">  
                @error('apellidos') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="tipo_documento">Tipo de documento</label>
                <select name="tipo_documento" id="tipo_documento" class="custom-select" wire:model.debounce.800ms="tipo_documento">
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
                <input id="nro_documento" class="form-control" type="text" wire:model.debounce.800ms="nro_documento">  
                @error('nro_documento') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input id="fecha_nacimiento" class="form-control" type="date" wire:model.debounce.800ms="fecha_nacimiento">  
                @error('fecha_nacimiento') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="genero">Género</label>
                <select name="genero" id="genero" class="custom-select" wire:model.debounce.800ms="genero">
                  <option value="" disabled>--Seleccionar--</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Sin definir">Sin definir</option>
                </select>
                @error('genero') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="celular1">Celular 1</label>
                <input id="celular1" class="form-control" type="text" wire:model.debounce.800ms="celular1">  
                @error('celular1') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="celular2">Celular 2</label>
                <input id="celular2" class="form-control" type="text" wire:model.debounce.800ms="celular2">  
                @error('celular2') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="direccion">Dirección</label>
                <input id="direccion" class="form-control" type="text" wire:model.debounce.800ms="direccion">  
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="estado_civil">Estado civíl</label>
                <select name="estado_civil" id="estado_civil" class="custom-select" wire:model.debounce.800ms="estado_civil">
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
                <input id="lugar_trabajo" class="form-control" type="text" wire:model.debounce.800ms="lugar_trabajo">  
                @error('lugar_trabajo') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="cargo">Cargo</label>
                <input id="cargo" class="form-control" type="text" wire:model.debounce.800ms="cargo">  
                @error('cargo') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="independiente">Independiente</label>
                <input id="independiente" class="form-control" type="text" wire:model.debounce.800ms="independiente">  
                @error('independiente') <span class="error">{{ $message }}</span> @enderror
              </div>
              

              <div class="form-group"></div>
              <div class="form-group"></div>
              <div class="form-group"></div>
              <div class="form-group"></div>
              <div class="form-group"></div>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" wire:click="closeModal()" data-dismiss="modal">Cancelar</button>
          @if ($modelId)
            <button  class="btn btn-success" wire:click="update" wire:loading.attr="disabled">
                {{ __('Actualizar') }}
            </danger-button>
          @else
              <button  class="btn btn-success" wire:click="create" wire:loading.attr="disabled">
                  {{ __('Crear') }}
              </danger-button>
          @endif
        </div>
      </div>
  </div>
</div>
<script>
  window.addEventListener('cerrarModal', event => {
     $("#clienteModal").modal('hide');
  })
  
</script>