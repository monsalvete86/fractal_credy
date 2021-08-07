<div>
  <div wire:ignore.self style="{{$modalStyle}}" class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos Usuario</h5>
          <button type="button" wire:click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="@if($editando) editar() @else crear() @endif">
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-12 col-sm-6">
                <label for="nombreCorto">Usuario</label>
                <input type="text" id="nombreCorto" wire:model="nombreCorto" class="form-control" required>
                @error('nombreCorto')
                  <p class="text-danger">{{$message }}</p>
                @enderror
              </div>
              <div class="col-12 col-sm-6">
                <label for="nombreUsuario">Nombre</label>
                <input type="text" id="nombreUsuario" wire:model="nombreUsuario" class="form-control" required>
                @error('nombreUsuario')
                  <p class="text-danger">{{$message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 col-sm-6">
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email" class="form-control" required>
                @error('email')
                <p class="text-danger">{{$message }}</p>
              @enderror
              </div>
              <div class="col-12 col-sm-6">
                <label for="celular">Celular</label>
                <input type="text" id="celular" wire:model="celular" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 col-sm-6">
                <label for="tipoDocumento">Tipo Documento</label>
                <select class="form-control" wire:model="tipoDocumento" id="tipoDocumento">
                  <option value=""></option>
                  <option value="CC" @if($tipoDocumento == "CC") selected @endif>CC</option>
                  <option value="CC" @if($tipoDocumento == "CE") selected @endif>CE</option>
                </select>
              </div>
              <div class="col-12 col-sm-6">
                <label for="documento">No. Documento</label>
                <input type="text" id="documento" wire:model="documento" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 col-sm-6">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" wire:model="direccion" class="form-control">
              </div>
              <div class="col-12 col-sm-6">
                <label for="sede">Sede</label>
                <select class="form-control" wire:model="idSede" id="idSede" required>
                  <option value=""></option>
                  @foreach($sedes as $dataSede)
                    <option value={{$dataSede->id}} @if($dataSede->id == $idSede) selected @endif>{{$dataSede->sede}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12 col-sm-6">
                <label for="idRol">Rol</label>
                <select class="form-control" wire:model="idRol" id="idRol" required>
                  <option value=""></option>
                  @foreach($roles as $dataRol)
                    <option value="{{$dataRol->id}}" @if($dataRol->id == $idRol) selected @endif>{{$dataRol->rol}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-sm-6">
                <label for="password">Password</label>
                <input type="password" id="password" wire:model="password" class="form-control" value="" @if($editando == '') required @endif>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="closeModal()" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" >{{$idUsuario? 'Actualizar' : 'Crear'}}</button>
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