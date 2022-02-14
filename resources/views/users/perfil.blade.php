@extends('layouts.app')
@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container" style='height:100vh;'>
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-sm-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Perfil</h5>
                        <form action="{{route('users.adicionarPerfil')}}" id="add_user" method='POST'>
                            {{csrf_field()}}
                            <input type="hidden" name="id_usuario" id="id_usuario" value="{{encrypt($user->id)}}" required>
                            <div class="form-group">
                                <label for="perfil">Perfis disponíveis</label>
                                <select name="perfil" id="perfil" class='form-control'>
                                    <option disabled selected>-- Selecione um perfil --</option>
                                    @forelse($perfis as $perfil)
                                        <option value="{{encrypt($perfil->id)}}">{{$perfil->nome}} - {{Str::limit($perfil->descricao, 30)}}</option>
                                    @empty
                                        <option disabled>-- Nenhum perfil disponível --</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Perfil(s) de {{$user->name}}</h5>
                        <table class="table table-highlight text-center">
                            <thead>
                                <tr>
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Descrição</th>
                                    <th scope='col'>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user->Perfil as $perfil)
                                    <tr>
                                        <td>{{$perfil->nome}}</td>
                                        <td>{{Str::limit($perfil->descricao, 50)}}</td>
                                        <td>
                                            <a href="{{route('users.deletarPerfil', [encrypt($user->id) , encrypt($perfil->id)])}}" class="btn btn-danger">Remover</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan='3'>Este usuário não possuí um perfil</td>
                                @endforelse
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection