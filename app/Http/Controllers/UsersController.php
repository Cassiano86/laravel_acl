<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // if(Gate::denies('acessar-painel-de-usuarios')){
        //     abort('403', 'Não autorizado');
        // }
        parent::acessarPermissao('acessar-painel-de-usuarios');

        $caminhos = [   
                        ['url' => 'welcome', 'titulo' => 'Página inicial'],
                        ['url' => 'users.index', 'titulo' => 'Usuários'],
                    ];

        return view('users.index',[
                                    'users' => User::OrderBy('id','desc')->paginate(10),
                                    'caminhos' => $caminhos
                                  ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caminhos = [   
            ['url' => 'welcome', 'titulo' => 'Página inicial'],
            ['url' => 'users.index', 'titulo' => 'Usuários'],
            ['url' => '', 'titulo' => 'Adicionar usuário'],
        ];

        return view('users.adicionar', [
                                        'perfis' => Perfil::all(),
                                        'caminhos' => $caminhos
                                       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = Hash::Make('senha123');
        $user->save();

        if($user->verificarRelacionamentoPerfil(decrypt($request->input('perfil')))){
            return redirect()->back();
        }
        
        $user->adicionarPerfil(decrypt($request->input('perfil')));
        
        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(decrypt($id));

        $caminhos = [   
            ['url' => 'welcome', 'titulo' => 'Página inicial'],
            ['url' => 'users.index', 'titulo' => 'Usuários'],
            ['url' => '', 'titulo' => 'Usuário: '.$user->name],
        ];

        return view('users.usuario',[
                                        'user'      => $user,
                                        'caminhos'  => $caminhos
                                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(decrypt($id));

        $caminhos = [   
            ['url' => 'welcome', 'titulo' => 'Página inicial'],
            ['url' => 'users.index', 'titulo' => 'Usuários'],
            ['url' => '', 'titulo' => 'Usuário: '.$user->name],
        ];

        return view('users.atualizar',[
                                        'user' => $user,
                                        'perfis' => Perfil::all(),
                                        'caminhos' => $caminhos
                                      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find(decrypt($id))
            ->update([
                        'name'  => $request->get('name'),
                        'email' => $request->get('email')
                    ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find(decrypt($id))->delete();

        return redirect()->route('users.index');
    }

    public function usersPerfil($id){
        $caminhos = [   
            ['url' => 'welcome', 'titulo' => 'Página inicial'],
            ['url' => 'users.index', 'titulo' => 'Usuários'],
            ['url' => '', 'titulo' => 'Adicionar Perfil ao usuário'],
        ];

        return view('users.perfil',[
                                    'user' => User::find(decrypt($id)),
                                    'perfis' => Perfil::all(),
                                    'caminhos' => $caminhos
                                ]);
    }

    public function adicionarPerfil(Request $request){
        $user = User::find(decrypt($request->get('id_usuario')));

        //Verificando se esse relacionamento já existe
        if($user->verificarRelacionamentoPerfil(decrypt($request->get('perfil')))){
            return redirect()->back();
        }

        $user->adicionarPerfil(decrypt($request->get('perfil')));

        return redirect()->back();
    }

    public function deletarPerfil($id_usuario, $id_perfil){
        $user = User::find(decrypt($id_usuario));
        
        $user->removerPerfil(decrypt($id_perfil));

        return redirect()->back();
    }
}
