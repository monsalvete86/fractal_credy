<?php

namespace App\Http\Livewire\User;

use App\Models\Rol;
use App\Models\Sede;
use App\Models\User;
use Livewire\Component;

class UserModal extends Component
{
  public $modalStyle = 'display:none';
  protected $listeners = [
    'showData',
    'showClean'
  ];
  public $fullUser = null;
  public $editando = null;
  public $idUsuario = '';
  public $nombreCorto = '';
  public $nombreUsuario = '';
  public $email = '';
  public $password = '';
  public $profilePhotoPath = '';
  public $celular = '';
  public $direccion = '';
  public $tipoDocumento = '';
  public $documento = '';
  public $idRol = 0;
  public $idSede = 0;
  public $sedes = [];
  public $roles = [];
  public $antPass = '';

  protected $rules = [
    'nombreUsuario' => 'required|min:3',
    'email' => 'email|required',
    'documento' => 'required',
  ];

  protected $messages = [
    'nombreUsuario.required' => 'El nombre de usuario es requerido.',
    'email.email' => 'Debe ingresar un correo válido.',
    'documento.required' => 'Debe ingresar el numero de documento.',
  ];

  public function render()
  {
    return view('user.user-modal');
  }

  public function showClean()
  {
    $this->reset();
    $this->getSedes();
    $this->getRoles();
    $this->modalStyle = 'display:block';
  }

  public function showData($user)
  {
    $this->fullUser = $user;
    $this->editando = $user['email'];
    $this->idUsuario = $user['id'];
    $this->nombreCorto = $user['name'];
    $this->nombreUsuario = $user['nombre'];
    $this->email = $user['email'];
    $this->profilePhotoPath = $user['profile_photo_path'];
    $this->celular = $user['celular'];
    $this->direccion = $user['direccion'];
    $this->tipoDocumento = $user['tipo_documento'];
    $this->documento = $user['documento'];
    $this->idRol = $user['id_rol'];
    $this->idSede = $user['id_sede'];
    $this->password = '';
    $this->antPass = $user['password'];

    $this->modalStyle = 'display:block';
  }

  public function mount()
  {
    $this->getSedes();
    $this->getRoles();
  }

  public function getRoles()
  {
    $auxRoles = Rol::where('estado_rol', '=', '1')->orderBy('rol')->get();
    $this->roles = $auxRoles;
  }

  public function getSedes()
  {
    $auxSedes = Sede::where('estado_sede', '=', '1')->orderBy('sede')->get();
    $this->sedes = $auxSedes;
  }

  public function closeModal()
  {
    $this->modalStyle = 'display:none';
    $this->reset();
    $this->emit('userTableUpdate');
    $this->dispatchBrowserEvent('cerrarModal');
    $this->getSedes();
    $this->getRoles();
  }

  public function crear()
  {
    $data = $this->validate();
    $newUsuario = new User;
    // dd($this->nombreCorto);
    $this->cargarData($newUsuario);
  }

  public function editar()
  {
    $this->validate();
    $oldUsuario = User::where('email', '=', $this->fullUser['email'])->firstOrFail();
    $this->cargarData($oldUsuario);
  }

  public function cargarData($user)
  {
    $user->name = $this->nombreCorto;
    $user->nombre = $this->nombreUsuario;
    $user->email = $this->email;
    $user->celular = $this->celular;
    $user->direccion = $this->direccion;
    $user->tipo_documento = $this->tipoDocumento;
    $user->documento = $this->documento;
    $user->id_sede = $this->idSede;
    $user->foto = '';
    $user->estado = 1;
    $user->id_rol = $this->idRol;

    if (($this->editando != '' && $this->password != '' && $this->antPass != $this->password) || $this->editando == '') {
      $user->password = md5($this->password);
    }

    $user->save();
    $this->closeModal();
  }
}
