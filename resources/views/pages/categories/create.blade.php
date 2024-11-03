@extends('layouts.app')

@section('content')
    <div class="shadow rounded">
        <div class="my-1">
            <h1>Editando categoria</h1>
        </div>
        <form action="{{route('category.store')}}" method="POST" >
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    @include('layouts.alerts')
                    <label for="title" class="form-label">Categoria</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="name" class="form-control"  placeholder="Nome do produto" value="">
                    </div>
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('product.index')}}" type="submit" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>  
@endsection
