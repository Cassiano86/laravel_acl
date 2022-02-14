@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Atualizar usuário</h5>
                <form action="{{route('users.update', encrypt($user->id))}}" id="add_user" method='POST'>
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class='form-control' id="name" value="{{$user->name}}" required>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class='form-control' id="email" value="{{$user->email}}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection