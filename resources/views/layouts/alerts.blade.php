@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
<div class="alert alert-warning" role="alert">
<ul>
    @foreach ( $errors->all() as $error)
        <li>{{$error}}</li>
        
    @endforeach
</ul>
</div>   
@endif