<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    use HasFactory;
    protected $table = 'gestores';

    public function artigos()
    {
        return $this->hasMany(Artigo::class, 'gestor_id');
    }
}
