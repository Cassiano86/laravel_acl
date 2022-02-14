<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissao = Permissao::firstOrCreate([
            'nome' => 'Deletar usuário',
            'prefixo' =>'deletar-usuário',
            'descricao' =>'Deletar usuário permanentemente do sistema'
        ]);

        $permissao_2 = Permissao::firstOrCreate([
            'nome'      => 'Visualizar perfil',
            'prefixo'   =>'visualizar-perfil',
            'descricao' =>'Visualizar perfis cadastrado no sistema'
        ]);

        $permissao_3 = Permissao::firstOrCreate([
            'nome'      => 'Adicionar perfil',
            'prefixo'   =>'adicionar-perfil',
            'descricao' =>'Adicionar perfis ao sistema'
        ]);

        $permissao_4 = Permissao::firstOrCreate([
            'nome'      =>  'Atualizar perfil',
            'prefixo'   =>  'atualizar-perfil',
            'descricao' =>  'Atualizar perfis cadastrados no sistema'
        ]);

        $permissao_5 = Permissao::firstOrCreate([
            'nome'      =>  'Deletar perfil',
            'prefixo'   =>  'deletar-perfil',
            'descricao' =>  'Deletar perfis cadastrados no sistema'
        ]);

        $permissao_6 = Permissao::firstOrCreate([
            'nome'      => 'Visualizar permissao',
            'prefixo'   =>'visualizar-permissao',
            'descricao' =>'Visualizar permissões cadastradas no sistema'
        ]);

        $permissao_7 = Permissao::firstOrCreate([
            'nome'      => 'Adicionar permissao',
            'prefixo'   =>'adicionar-permissao',
            'descricao' =>'Adicionar permissões ao sistema'
        ]);

        $permissao_8 = Permissao::firstOrCreate([
            'nome'      =>  'Atualizar permissao',
            'prefixo'   =>  'atualizar-permissao',
            'descricao' =>  'Atualizar permisão cadastrada no sistema'
        ]);

        $permissao_9 = Permissao::firstOrCreate([
            'nome'      =>  'Deletar permissao',
            'prefixo'   =>  'deletar-permissao',
            'descricao' =>  'Deletar permissões cadastradas no sistema'
        ]);

        $permissao_10 = Permissao::firstOrCreate([
            'nome'      =>  'Visualizar perfil usuário',
            'prefixo'   =>  'visualizar-perfil-usuario',
            'descricao' =>  'Visualizar o perfil de cada usuário no sistema'
        ]);
        $permissao_11 = Permissao::firstOrCreate([
            'nome'      =>  'Visualizar permissões perfil',
            'prefixo'   =>  'visualizar-permissoes-perfil',
            'descricao' =>  'Visualizar as permissões que cada perfil tem'
        ]);
    }
}
