<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Perfil::firstOrCreate([
            'nome' =>'Admin',
            'descricao' =>'Acesso total ao sistema'
        ]);
  
        $p2 = Perfil::firstOrCreate([
            'nome' =>'Gerente',
            'descricao' =>'Gerenciamento do sistema'
        ]);
  
        $p3 = Perfil::firstOrCreate([
            'nome' =>'Vendedor',
            'descricao' =>'Acesso ao site como vendedor'
        ]);

        $p4 = Perfil::firstOrCreate([
            'nome' =>'Usuario',
            'descricao' =>'Acesso ao site como usuário'
        ]);
    }
}
