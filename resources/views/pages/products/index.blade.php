@extends('layouts.app')

@section('content')
    <div class="shadow rounded mb-3">
        @include('layouts.alerts')
        <div class="my-1">
            <h1>Produtos</h1>
            <a href="{{route('product.create')}}" class="btn btn-primary my-1">Novo Produto <i class="bi bi-plus-circle-fill"></i></a>
            <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Filtros <i class="bi bi-search"></i>
            </button>
              <div class="collapse" id="collapseExample">
                <div class="">
                    <form action="{{route('product.index')}}">
                        <div class="row align-items-end">
                            <div class="col-md-2">
                                <label for="idProduct" class="form-label">ID</label>
                                <div class="input-group">
                                    <input type="text" name="id" class="form-control"  placeholder="Nome do produto">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="name" class="form-label">Nome do Produto</label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control"  placeholder="Nome do produto">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="name" class="form-label">Categoria</label>
                                <div class="input-group">
                                    <input type="text" name="category" class="form-control"  placeholder="Categoria">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="has_image" class="form-label">Produtos</label>
                                <select name="has_image" class="form-select form-select">
                                    <option value="">...</option>
                                    <option value="1">Com Imagem</option>
                                    <option value="0">Sem Imagem</option>
                                </select>
                            </div>
                    
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary h-100">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
    <div class="shadow rounded table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th> 
                    <th>Price</th> 
                    <th>Description</th> 
                    <th>Category</th> 
                    <th>Image_url</th>
                    <th>Actions</th>    
                </tr>   
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ Str::limit($product->name, 25) }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ Str::limit($product->description, 20) }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ Str::limit($product->image_url, 15) }}</td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}"><i class="bi bi-pencil-square"></i></a> 
                            <a href="{{route('product.show', $product->id)}}"><i class="bi bi-eye-fill mx-1"></i></a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
    </div>


@endsection
