<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioLugarController extends Controller
{
    public function index()
    {
        return view('DatosLugarPresentacion.index');
    }


}
