@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container">
        <div class="d-flex justify-content-end my-3">
            <a href="{{route('perfil.create')}}" title="" class="btn btn-success">Novo perfil</a>
        </div>

        <div class="table-responsive">
            <table class="table table-highlight text-center">
                <thead class="thead-dark">
                    <th scope='col'>Perfil</th>
                    <th scope='col'>Descrição</th>
                    <th scope='col'>Ação</th>
                </thead>
                <tbody>
                    @forelse($perfis as $perfil)
                        <tr>
                            <td>{{$perfil->nome}}</td>
                            <td>{{Str::limit($perfil->descricao, 40)}}</td>
                            <td>
                                <div class="row justify-content-around">
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('perfil.permissao', encrypt($perfil->id))}}" title="Visualizar perfil" class="btn btn-info">Permissões</a>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('perfil.edit', encrypt($perfil->id))}}" title="" class="btn btn-warning">Editar</a>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('perfil.show', encrypt($perfil->id))}}" title="" class="btn btn-primary">Detalhes</a>
                                    </div>
                                </div>
                            </td>
                        </tr> 
                    @empty
                        <td colspan='4'>Nenhum perfil cadastrado</td>
                    @endforelse
                </tbody>   
            </table>
        </div>
    </div>
</div>
@endsection