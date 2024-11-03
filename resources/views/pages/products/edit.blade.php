@extends('layouts.app')

@section('content')
    <div class="shadow rounded">
        <div class="my-1">
            <h1>Editando produto</h1>
        </div>
        <form action="{{route('product.update', $product['id'])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                @include('layouts.alerts')
                <div class="col-md-6">
                    <label for="title" class="form-label">Nome do Produto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="title" class="form-control"  placeholder="Nome do produto" value="{{$product['name']}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="productPrice" class="form-label">Preço</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="price" class="form-control" placeholder="1.00" value="{{$product['price']}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="productPrice" class="form-label">Categoria</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pen-fill"></i></span>
                        <select class="form-select" name="category" aria-label="Default select example">
                            <option selected>...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category['name'] }}" 
                                {{ $product['category'] == $category['name'] ? 'selected' : '' }}>
                                {{ $category['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="productPrice" class="form-label">Descrição</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pen-fill"></i></span>
                        <textarea class="input-group-text" name="description" id="" cols="125" rows="6" >{{$product['description']}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="productPrice" class="form-label">Imagem</label>
                    <div class="card" style="width: 14rem;">
                        @if(str_starts_with($product['image_url'], 'http'))
                            <img src="{{$product['image_url']}}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ asset('storage/'.$product['image_url']) }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                          <p class="card-text">Product image</p>
                        </div>
                      </div>
                </div>
                <div class="col-md-12">
                    <label for="productPrice" class="form-label">Nova Imagem</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
