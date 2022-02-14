@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container mt-5">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Adicionar permissão</h5>
                <form action="{{route('permissao.update', encrypt($permissao->id))}}" id="add_user" method='POST'>
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="nome">Permissão</label>
                            <input type="text" name="nome" class='form-control' id="nome" placeholder="Adicione uma permissão" value="{{$permissao->nome}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control">{{$permissao->descricao}}</textarea>
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