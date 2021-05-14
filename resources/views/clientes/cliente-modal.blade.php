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

        <form wire:submit.prevent="@if($editando) editar() @else crear() @endif">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group">
                <label for="nombres" value="{{ _('Nombre') }}"><label>
                <input id="nombres" class="block mt-1 w-full" type="text" wire:model="nombres">
                @error('nombres') <span class="error">{{ $message }}</span> @enderror
              </div>
              <div class="form-group"></div>
              <div class="form-group"></div>
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
          <button type="submit" class="btn btn-success" >{{$modelId? 'Actualizar' : 'Crear'}}</button>
        </div>
      </div>
  </div>
</div>
