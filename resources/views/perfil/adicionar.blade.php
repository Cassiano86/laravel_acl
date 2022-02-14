@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Adicionar perfil</h5>
                <form action="{{route('perfil.store')}}" id="add_user" method='POST'>
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class='form-control' id="nome" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"></textarea>
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