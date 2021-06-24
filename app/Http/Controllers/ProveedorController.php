<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function lista() {
        return view('proveedores.lista');
    }
}