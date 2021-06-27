@extends('layouts.app')

@section('content')

<div class="cuadro">
    
    <div class="row justify-content-md-center h-100">
        <div class="col-md-8 mx-auto">
            @auth
                <div class="alert alert-primary">
                    <div class="" data-toggle="buttons">
                        <a class="btn btn-primary" href="{{ url("/posts/myPosts") }}">
                            My Posts
                        </a>
                        <a class="btn btn-primary" href="{{ url("/user/modify/") }}">
                            Modificar cuenta
                        </a>
                    </div>
                </div>
            @else
                <div class="alert alert-secondary" role='alert'>
                    <p>
                        Si deseas habilitar estas opciones <a href="{{ url('/login') }}">inicia sesion</a> 
                        o <a href="{{ url('/register') }}">registrate</a>
                    </p>
                </div>
            @endauth
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="row align-items-center h-100">
            <div class="card col-md-8 mx-auto">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('/posts/'.$post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h5>
                    @if (Request::url() == url('/posts/myPosts'))
                        @auth
                            <form action="{{route('post', $post)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                            <button  class="btn btn-danger" type="submit">Eliminar</button>
                        @endauth
                    @endif
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection