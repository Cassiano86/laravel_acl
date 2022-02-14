@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container mt-5">
        <div class="d-flex justify-content-end my-3">
            <a href="{{route('permissao.create')}}" title="" class="btn btn-success">Novo permissao</a>
        </div>

        <div class="table-responsive">
            <table class="table table-highlight text-center">
                <thead class="thead-dark">
                    <th scope='col'>Permissao</th>
                    <th scope='col'>Descrição</th>
                    <th scope='col'>Ação</th>
                </thead>
                <tbody>
                    @forelse($permissoes as $permissao)
                        <tr>
                            <td>{{$permissao->nome}}</td>
                            <td>{{Str::limit($permissao->descricao, 40)}}</td>
                            <td>
                                <div class="row justify-content-around">
                                    <div class="col-lg-6 col-sm-12">
                                        <a href="{{route('permissao.edit', encrypt($permissao->id))}}" title="" class="btn btn-warning">Editar</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <a href="{{route('permissao.show', encrypt($permissao->id))}}" title="" class="btn btn-primary">Detalhes</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan='4'>Nenhuma permissão cadastrado</td>
                    @endforelse
                </tbody>   
            </table>
            <div class="d-flex justify-content-end">
                {{$permissoes->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection