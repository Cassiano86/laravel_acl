@extends('layouts.app')

@section('content')
<div class="container-fluid px-0 bg-dark" style="height:100vh!important;">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            @can('acessar-painel-de-usuarios')
                <div class="col-lg-4 col-sm-12">
                    <div class="card border border-warning rounded">
                        <img src="{{asset('storage/index/usuarios.webp')}}" alt="" style="height: 250px!important;">
                        <div class="card-body bg-primary text-white">
                            <h3 class="card-title">Painel de usuários</h3>
                            <h5>
                                Veja o painel de usuários
                                <a class='text-warning fw-bold' href="{{route('users.index')}}">Acessar</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endcan
            
            @can('acessar-painel-de-perfis')
                <div class="col-lg-4 col-sm-12">
                    <div class="card border border-warning rounded">
                        <img src="{{asset('storage/index/perfis.jpeg')}}" alt="" style="height: 250px!important;">
                        <div class="card-body bg-primary text-white">
                            <h3 class="card-title">Painel de perfis</h3>
                            <h5>
                                Veja o painel de perfis
                                <a class='text-warning fw-bold' href="{{route('perfil.index')}}">Acessar</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endcan
            
            @can('acessar-painel-de-permissoes')
                <div class="col-lg-4 col-sm-12">
                    <div class="card border border-warning rounded">
                        <img src="{{asset('storage/index/permissoes.jpg')}}" alt="" style="height: 250px!important;">
                        <div class="card-body bg-primary text-white">
                            <h3 class="card-title">Painel de permissao</h3>
                            <h5>
                                Veja o painel de permissões
                                <a class='text-warning fw-bold' href="{{route('permissao.index')}}">Acessar</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endcan)
        </div>
    </div>
</div>
@endsection