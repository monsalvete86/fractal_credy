<div>
  <div wire:ignore.self style="{{$modalStyle}}" class="modal " id="proveedorModal" tabindex="-1" role="dialog" aria-labelledby="proveedorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="proveedorModalLabel">Datos Proveedor</h5>
          <button type="button" wire:click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form wire:submit.prevent="@if($modelId) update() @else create() @endif">
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
                <select name="tipo_documento" id="tipo_documento" class="custom-select"
                  wire:model="tipo_documento">
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
                <label for="email">Email</label>
                <input id="email" class="form-control" type="text" wire:model.debounce.800ms="email">
                @error('email')<span class="error">{{ $message }}</span> @enderror
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal()" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" >{{$modelId? 'Actualizar' : 'Crear'}}</button>
          </div>
        </form>
      </div>
  </div>
</div>
<script>
  window.addEventListener('cerrarModal', event => {
     $("#proveedorModal").modal('hide');
  })
</script>