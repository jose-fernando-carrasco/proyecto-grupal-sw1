<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function create(){
        return view('mascotas.create');
    }
}
