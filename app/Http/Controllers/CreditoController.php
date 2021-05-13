<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function list() {
        return view('creditos.list');
    }
}
