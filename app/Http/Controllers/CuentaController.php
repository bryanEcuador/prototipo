<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index() {
        return view('modulos.cuenta.index');
    }
}
