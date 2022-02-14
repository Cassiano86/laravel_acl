<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permissao;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        foreach($this->Permissoes() as $permissao){
            Gate::define($permissao->prefixo, function($user) use($permissao){
                return $user->verificarPermissao($permissao->Perfil) || $user->isAdmin();
            });
        }
        
    }

    public function Permissoes(){
        return Permissao::with('Perfil')->get();
    }
}
