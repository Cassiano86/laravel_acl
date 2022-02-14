<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Perfil;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        $admin = false;

        foreach($this->Perfil as $perfil){
            if($perfil->id == 1){
                $admin = true;
            }
        }
        return $admin;
    }

    public function Perfil(){
        return $this->belongsToMany(Perfil::class);
    }

    public function verificarRelacionamentoPerfil($id_perfil){
        return(boolean) $this->Perfil->find($id_perfil);
    }

    public function adicionarPerfil($id_perfil){
        return $this->Perfil()->attach($id_perfil);
    }

    public function removerPerfil($id_perfil){
        return $this->Perfil()->detach($id_perfil);
    }

    public function verificarPermissao($perfil){

        // $dados = collect(['futebol', 'basquete', 'baseball', 'vôlei', 'tênis', 'corrida']);
        // $intersect = $dados->intersect(['basquete', 'baseball', 'corrida']);
        // dd($intersect->all());

        return $perfil->intersect($this->Perfil)->count();
    }
}
