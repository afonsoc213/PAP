<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index()
    {
        $gestores = auth()->user()->gestores;
        return view('gestor', compact('gestores'));
    }

    public function update(Request $request, Gestor $gestor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);
    
        $gestor->nome = $request->nome;
        $gestor->save();
    
        return response()->json($gestor);
    }
    

    
    public function store(Request $request)
    {
        $gestor = new Gestor();
        $gestor->nome = 'Novo Gestor'; 
        $gestor->user_id = $request->user_id; 
        $gestor->save();

        return response()->json($gestor);
    }
}
