@extends('layouts.app')

@section('content')
    <div class="shadow rounded ">
        <div class="my-1 ">
            <h1>Produto {{$product['id']}}</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card mb-3 " style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    @if(str_starts_with($product['image_url'], 'http'))
                        <img src="{{$product['image_url']}}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ asset('storage/'.$product['image_url']) }}" class="card-img-top" alt="...">
                    @endif
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$product['name']}}</h5>
                      <p class="card-text">{{$product['description']}}</p>
                      <h5><strong>Categoria: </strong><span class="badge text-bg-secondary">{{$product['category']}}</span></h5>
                      <h5><strong>Preço: </strong><span class="badge text-bg-primary">{{$product['price']}}</span></h5>
                    </div>
                  </div>
                </div>
                <div class="m-2 d-flex justify-content-start ">
                    <form action="{{route('product.destroy', $product['id'])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mx-1">Deletar</button>
                    </form>
                    <a href="{{route('product.index')}}" type="submit" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
  

@endsection
