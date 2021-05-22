<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditosController extends Controller
{
  public function main() {
    return view('creditos.main');
  }
}
