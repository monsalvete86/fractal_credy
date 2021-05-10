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
        <button class="btn btn-primary" wire:click="newUser()" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
    </div>
  </div>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Documento</th>
        <td>Celular</td>
        <td>Sede</td>
        <td>Rol</td>
        <td>Estado</td>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{$cont++}}</td>
          <td>{{$user->name}} {{$user->id}}</td>
          <td>{{$user->nombre}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->documento}}</td>
          <td>{{$user->celular}}</td>
          <td>{{$user->sede}}</td>
          <td>{{$user->rol}}</td>
          <td>{{$user->estado? 'Activo' : 'Inactivo'}}</td>
          <td>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
              wire:click="showModal({{$user}})"
            >
              Editar
            </button>
            @if($user->estado == 1)
              <button class="btn btn-danger">
                Inactivar
              </button>
            @else
              <button class="btn btn-alert">
                Inactivar
              </button>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}  
</div>
