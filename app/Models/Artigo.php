<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_artigo',
        'descricao_artigo',
        'quantidade_artigo',
        'preco_artigo',
        'foto_artigo',
        'medida_artigo',
        'tipo_medida',
        'cor_artigo',
        'serial_number',
        'gestor_id',
    ];

    public function gestor()
    {
        return $this->belongsTo(Gestor::class);
    }
}
