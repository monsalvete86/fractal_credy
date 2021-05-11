<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\{Component, WithPagination};

class UserTable extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $cont = 1;
  public $textSearch = '';
  public $rolSearch = 0;

  protected $listeners = [
    'userTableUpdate' => 'render',
    'borrarUsuario',
    'activarUsuario'
  ];
  
  public function render() {
    
    $users = User::where(function($query) {
      $query->select('*','users.estado as users_estado')->where('nombre', 'like', "$this->textSearch%")
      ->orWhere('name', 'like', "$this->textSearch%")
      ->orWhere('email', 'like', "$this->textSearch%");
    })->join('sedes','sedes.id','id_sede')
      ->join('roles','roles.id','id_rol');
      
    if($this->rolSearch != 0) {
      $users = $users->where('id_rol', "=", "$this->rolSearch");
    }

    $users = $users->orderBy('nombre')->paginate(10);
    return view('livewire.user-table', [
      'users' => $users
    ]);
  }

  public function updatingTextSearch() {
    $this->resetPage();
  }

  public function updatingRolSearch() {
    $this->resetPage();
  }

  public function showModal($user) {    
    $this->emit('showData', $user);
  }

  public function newUser() {
    $this->emit('showClean');
  }

  public function borrarUsuario(User $user) {
    $user->estado = 0;
    $user->save();
    $this->render();
  }

  public function activarUsuario(User $user) {
    $user->estado = 1;
    $user->save();
    $this->render();
  }
}
