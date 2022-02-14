<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Permissao;

class PerfilController extends Controller
{
    public function index(){
        $caminhos = [   
                        ['url' => 'welcome' , 'titulo' => 'Página inicial'],
                        ['url' => '' , 'titulo' => 'Perfis']
                    ];

        return view('perfil.index', [
                                        'perfis' => Perfil::all(),
                                        'caminhos' => $caminhos
                                    ]);
    }

    public function create(){
        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'perfil.index' , 'titulo' => 'Perfis'],
            ['url' => '' , 'titulo' => 'Adicionar perfil']
        ];

        return view('perfil.adicionar', ['caminhos' => $caminhos]);
    }

    public function store(Request $request){

        Perfil::create([
            'nome'      => $request->get('nome'),
            'descricao' => $request->get('descricao'),
        ]);

        return redirect()->route('perfil.index');
    }

    public function show($id){
        $perfil = Perfil::find(decrypt($id));

        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'perfil.index' , 'titulo' => 'Perfis'],
            ['url' => '' , 'titulo' => 'Perfil: '.$perfil->nome]
        ];

        return view('perfil.perfil', [
                                        'perfil' => $perfil,
                                        'caminhos' => $caminhos
                                    ]);
    }

    public function edit($id){
        $perfil = Perfil::find(decrypt($id));

        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'perfil.index' , 'titulo' => 'Perfis'],
            ['url' => '' , 'titulo' => 'Perfil: '.$perfil->nome]
        ];

        return view('perfil.atualizar', [
                                            'perfil' => $perfil,
                                            'caminhos' => $caminhos
                                        ]);
    }

    public function update(Request $request, $id){
        Perfil::find(decrypt($id))
              ->update([
                            'nome'      => $request->input('nome'),
                            'descricao' => $request->input('descricao'),
                      ]);

        return redirect()->route('perfil.index');
    }

    public function destroy($id){
        Perfil::find(decrypt($id))->delete();
        return redirect()->route('perfil.index');
    }

    public function perfilPermissao($id){
        $perfil = Perfil::find(decrypt($id));

        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'perfil.index' , 'titulo' => 'Perfis'],
            ['url' => '' , 'titulo' => 'Perfil: '.$perfil->nome]
        ];

        return view('perfil.permissao',[
                                            'perfil'      => $perfil,
                                            'permissoes'  => Permissao::all(),
                                            'caminhos'    => $caminhos 
                                        ]);
    }

    public function adicionarPermissao(Request $request){
        $perfil = Perfil::find(decrypt($request->get('perfil')));

        if($perfil->verificarPermissao(decrypt($request->get('permissao')))){
            return redirect()->back();
        }

        $perfil->adicionarPermissao(decrypt($request->get('permissao')));
        return redirect()->back();
    }

    public function deletarPermissao($id_perfil, $id_permissao){
        $perfil = Perfil::find(decrypt($id_perfil));

        $perfil->removerPermissao(decrypt($id_permissao));
        return redirect()->back();
    }
}
