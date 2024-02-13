<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index()
    {
        return view('gestor');
    }
}
