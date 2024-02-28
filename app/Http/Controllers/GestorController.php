<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index()
    {
        return view('gestor');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $gestor = Gestor::findOrFail($id);
        $gestor->nome = $request->nome;
        $gestor->save();
    }
}