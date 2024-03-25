<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;

class ArtigoController extends Controller
{
    public function index()
    {
        return view('adicionarArt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'quantidade' => 'required|numeric|min:1',
            'preco' => 'required|numeric|min:0',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'medida' => 'required|string',
            'cor' => 'required|string',
            'serial_number' => 'required|string',
        ]);
        
        $imagemNome = $request->file('imagem')->store('imagens');
        
        $artigo = new Artigo();
        $artigo->nome_artigo = $request->nome;
        $artigo->descricao_artigo = $request->descricao;
        $artigo->quantidade_artigo = $request->quantidade;
        $artigo->preco_artigo = $request->preco;
        $artigo->foto_artigo = $imagemNome;
        $artigo->medida_artigo = $request->medida;
        $artigo->cor_artigo = $request->cor;
        $artigo->serial_number = $request->serial_number;
        $artigo->gestor_id = $request->gestor_id; 
        $artigo->save();
        
        return redirect()->route('gestor')->with('success', 'Artigo adicionado com sucesso!');
    }
}


