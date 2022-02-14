@extends('layouts.app')
@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container" style='height:100vh;'>
        <div class="row h-100 align-items-center justify-content-center">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar permissão</h5>
                        <form action="{{route('perfil.adicionarPermissao')}}" method='POST'>
                            {{csrf_field()}}
                            <input type="hidden" name="perfil" id="perfil" value="{{encrypt($perfil->id)}}" required>
                            <div class="form-group">
                                <label for="permissao">Permissões disponíveis</label>
                                <select name="permissao" id="permissao" class='form-control'>
                                    <option disabled selected>-- Selecione uma permissao --</option>
                                    @forelse($permissoes as $permissao)
                                        <option value="{{encrypt($permissao->id)}}">{{$permissao->nome}} - {{Str::limit($permissao->descricao, 30)}}</option>
                                    @empty
                                        <option disabled>-- Nenhuma permissão disponível --</option>
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
                        <h5 class="card-title">Permissões de {{$perfil->name}}</h5>
                        <table class="table table-highlight text-center">
                            <thead>
                                <tr>
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Descrição</th>
                                    <th scope='col'>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perfil->Permissao as $permissao)
                                    <tr>
                                        <td>{{$permissao->nome}}</td>
                                        <td>{{Str::limit($permissao->descricao, 50)}}</td>
                                        <td>
                                            <a href="{{route('perfil.deletarPermissao', [encrypt($perfil->id) , encrypt($permissao->id)])}}" class="btn btn-danger">Remover</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan='3'>Este usuário não possuí um permissão</td>
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