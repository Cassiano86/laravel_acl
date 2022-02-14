<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permissao;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';

    protected $fillable = ['nome', 'descricao'];

    public function Permissao(){
        return $this->belongsToMany(Permissao::class);
    }

    public function verificarPermissao($id_permissao){
        return(boolean) $this->Permissao()->find($id_permissao);
    }

    public function adicionarPermissao($id_permissao){
        return $this->Permissao()->attach($id_permissao);
    }

    public function removerPermissao($id_permissao){
        return $this->Permissao()->detach($id_permissao);
    }
}
