<div class="table-responsive">
  <div class="form-group row">
    <div class="col-12 col-sm-8">
      <label for="textSearch">Buscar</label>
      <input type="text" wire:model="textSearch" class="form-control" id="textSearch" placeholder="Buscar...">
    </div>
    <div class="form-group col-12 col-sm-4">
      <label for="rolSearch">Rol</label>
      <select wire:model="rolSearch" name="rolSearch" id="rolSearch" wire:change="render()" class="form-control">
        <option value="0"></option>
        <option value="1">Administrador</option>
        <option value="2">Operario</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-12">
        <button class="btn btn-outline-primary" wire:click="newUser()" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
    </div>
  </div>
  <table class="table table-striped table-sm table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Documento</th>
        <th>Celular</th>
        <th>Sede</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{$cont++}} </td>
          <td>{{$user->name}} {{$user->id}}</td>
          <td>{{$use  r->nombre}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->documento}}</td>
          <td>{{$user->celular}}</td>
          <td>{{$user->sede}}</td>
          <td>{{$user->rol}}</td>
          <td>{{$user->estado == 0 ? 'Inactivo' : 'Activo'}}</td>
          <td>
            @if($user->estado == 1)
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                wire:click="showModal({{$user}})"
              >
              <span class="material-icons">create</span>

              </button>
              <button class="btn btn-danger" onclick="inactivar('{{$user->email}}','{{$user->name}}')">
                <span class="material-icons">cancel</span>
              </button>
            @else
              <button class="btn btn-warning" onclick="activar('{{$user->email}}','{{$user->name}}')">
                <span class="material-icons">check_circle</span>
              </button>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}
</div>
@push('scripts')

  <script>
    function inactivar(email, name) {
      Swal.fire({
        icon: 'warning',
        text: 'Esta seguro de desactivar este usuario? ',
        showCancelButton: true,
        confirmButtonText: 'Inacitvar',
        confirmButtonColor: '#cf0854',
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('borrarUsuario', email, name);
        }
      });
    }
    function activar(email, name) {
      Swal.fire({
        incon: 'warning',
        text: 'Esta seguro de reactivar este usuario ',
        showCancelButton: true,
        confirmButtonText: 'Activar',
        confirmButtonColor: 'green',
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('activarUsuario', email, name);
        }
      });
    }
  </script>
@endpush
