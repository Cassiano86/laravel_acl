<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissao';

    protected $fillable = ['nome', 'prefixo', 'descricao'];

    public function Perfil(){
        return $this->belongsToMany(Perfil::class);
    }
}
