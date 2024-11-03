@extends('layouts.app')

@section('content')
    <div class="shadow rounded mb-3">
        @include('layouts.alerts')
        <div class="my-1">
            <h1>Categorias</h1>
            <a href="{{route('category.create')}}" class="btn btn-primary my-1">Nova Categoria <i class="bi bi-plus-circle-fill"></i></a>
        </div>
    </div>
    <div class="shadow rounded table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th> 
                    <th>Actions</th>    
                </tr>   
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{route('category.edit', $category->id)}}"><i class="bi bi-pencil-square"></i></a> 
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->appends(request()->query())->links('vendor.pagination.bootstrap-4') !!}
    </div>


@endsection
