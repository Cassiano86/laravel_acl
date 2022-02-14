<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrFail([
            'name' =>'Administrador',
            'email' => 'admin@mail.com',
            'password' => Hash::Make('senha123'),
        ]);

        User::firstOrFail([
            'name' => 'Usuário 1',
            'email' => 'usuario_1@mail.com',
            'password' => Hash::Make('senha123'),
        ]);

        User::firstOrFail([
            'name' => 'Usuário 2',
            'email'=> 'usuario_2@mail.com',
            'password' => Hash::Make('senha123'),
        ]);
    }
}
