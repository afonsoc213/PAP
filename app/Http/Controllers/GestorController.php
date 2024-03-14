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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $gestor = Gestor::findOrFail($id);
        $gestor->nome = $request->nome;
        $gestor->save();

        return redirect()->route('gestor')->with('success', 'Gestor atualizado com sucesso!');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $gestor = new Gestor();
        $gestor->nome = "Novo Gestor"; // Nome padrão para o novo gestor
        $user->gestores()->save($gestor);

        // Retorna a lista atualizada de gestores
        $gestores = $user->gestores;
        return view('partials.gestores_list', compact('gestores'));
    }
}
