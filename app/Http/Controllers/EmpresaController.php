<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function showForm()
    {
        return view('empresa.form'); 
    }

    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'nome' => 'required',
            'cidade_pais' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);
    
        Empresa::create([
            'nome' => $request->input('nome'),
            'cidade_pais' => $request->input('cidade_pais'),
            'logo' => $request->file('logo')->store('logos'), 
            'user_id' => auth()->user()->id,
        ]);
    
      return redirect()->route('dashboard')->with('success', 'Empresa criada com sucesso!');
    }
}

