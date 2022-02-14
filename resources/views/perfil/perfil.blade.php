@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    @include('components._breadcrumb')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-highlight text-center">
                <thead class="thead-dark">
                    <th scope='col'>Perfil</th>
                    <th scope='col'>Descrição</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$perfil->nome}}</td>
                        <td>{{Str::limit($perfil->descricao, 40)}}</td>
                    </tr>
                </tbody>   
            </table>
            <div class="row">
                <div class="offset-lg-6 col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="d-flex justify-content-end col-lg-6 col-sm-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="radio_deletar" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label pr-4" for="flexSwitchCheckDefault">Deletar perfil?</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end col-lg-6 col-sm-12">
                            <form action="{{route('users.destroy', encrypt($perfil->id))}}">
                                {{csrf_field()}}
                                @method('delete')
                                <button type="submit" class="btn btn-danger" id="btn_deletar" disabled>Deletar</button>
                            </form>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{asset('../js/funcao_deletar.js')}}"></script>
@endpush
@endsection