<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;

class PermissaoController extends Controller
{
    public function index(){
        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => '' , 'titulo' => 'Permissões']
        ];

        return view('permissao.index',[
                                        'permissoes' => Permissao::paginate(10),
                                        'caminhos' => $caminhos
                                    ]);
    }

    public function create(){
        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'permissao.index' , 'titulo' => 'Permissões'],
            ['url' => '' , 'titulo' => 'Adicionar Permissão']
        ];

        return view('permissao.adicionar',['caminhos' => $caminhos]);
    }

    public function store(Request $request){
        $permissao = new Permissao();
        
        $permissao->nome = $request->get('nome');
        $permissao->prefixo = parent::removerCaracteres($request->get('nome'));
        $permissao->descricao = $request->get('descricao');
        $permissao->save();

        return redirect()->route('permissao.index');
    }

    public function show($id){
        $permissao = Permissao::find(decrypt($id));
        $caminhos = [   
                        ['url' => 'welcome' , 'titulo' => 'Página inicial'],
                        ['url' => 'permissao.index' , 'titulo' => 'Permissões'],
                        ['url' => '' , 'titulo' => 'Permissão: '.$permissao->nome]
                    ];

        return view('permissao.show',[
                                        'permissao' => $permissao,
                                        'caminhos'  => $caminhos
                                    ]);
    }

    public function edit($id){
        $permissao = Permissao::find(decrypt($id));
        $caminhos = [   
            ['url' => 'welcome' , 'titulo' => 'Página inicial'],
            ['url' => 'permissao.index' , 'titulo' => 'Permissões'],
            ['url' => '' , 'titulo' => 'Atualizar Permissão: '.$permissao->nome]
        ];

        return view('permissao.atualizar',[
                                            'permissao' => $permissao,
                                            'caminhos'  => $caminhos
                                        ]);        
    }

    public function update(Request $request, $id){
        Permissao::find(decrypt($id))
                 ->update([
                            'nome'      => $request->get('nome'),
                            'prefixo'   => parent::removerCaracteres($request->get('nome')),
                            'descricao' => $request->get('descricao'),
                         ]);
        
        return redirect()->route('permissao.index');
    }

    public function destroy($id){
        Permissao::find(decrypt($id))->delete();
        return redirect()->route('permissao.index');
    }
}
