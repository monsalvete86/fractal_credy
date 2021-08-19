<div>
    <div wire:ignore.self style="{{ $modalStyle }}" class="modal " id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos Usuario</h5>
                    <button type="button" wire:click="closeModal()" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="@if ($editando) editar() @else crear() @endif">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-12 col-sm-6">
                                <label for="nombreCorto">Usuario</label>
                                <input type="text" id="nombreCorto" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">{{ $editando ? 'Actualizar' : 'Crear' }}</button>
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
