@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container">
        <div class="d-flex justify-content-end my-3">
            <a href="{{route('users.create')}}" title="" class="btn btn-success">Novo usuário</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-highlight text-center table-hover">
                <thead class="thead-dark table-dark">
                    <th scope='col'>Nome</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Ação</th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="row justify-content-around">
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('users.perfil', encrypt($user->id))}}" title="Visualizar perfil" class="btn btn-info">Perfil</a>
                                    </div>
                                    
                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('users.edit', encrypt($user->id))}}" title="" class="btn btn-warning">Editar</a>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <a href="{{route('users.show', encrypt($user->id))}}" title="" class="btn btn-primary">Detalhes</a>
                                    </div>
                                </div>
                            </td>
                        </tr> 
                    @empty
                        <td colspan='4'>Nenhum usuário cadastrado</td>
                    @endforelse
                </tbody>   
            </table>
            <div class="d-flex justify-content-end">
                {{$users->links('pagination::bootstrap-4')}}
            </div> 
        </div>
    </div>
</div>
@endsection