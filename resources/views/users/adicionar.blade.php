@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container">
        <div class="d-flex justify-content-end my-3">
            <a href="{{route('users.index')}}" title="" class="btn btn-success">voltar</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Adicionar usuário</h5>
                <form action="{{route('users.store')}}" id="add_user" method='POST'>
                    {{csrf_field()}}

                    <div class="form-group row">
                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class='form-control' id="name" required>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <label for="email">Nome</label>
                            <input type="email" name="email" class='form-control' id="email" required>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <label for="perfil">Perfil</label>
                            <select name="perfil" id="perfil" class="form-control" required>
                                <option disabled selected>-- Selecione um perfil --</option>
                                @forelse($perfis as $perfil)
                                    <option value="{{encrypt($perfil->id)}}">{{$perfil->nome}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection