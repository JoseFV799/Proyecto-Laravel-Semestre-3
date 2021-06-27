@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Opciones de cuenta') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ url('/user/modify/' . Auth::user()->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="name" 
                                type="name" 
                                placeholder="Nombre de Usuario"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ Auth::user()->name }}" 
                                autocomplete="name" 
                                autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="email" 
                                type="email" 
                                placeholder="Correo de usuario" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ Auth::user()->email }}" 
                                autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="password" 
                                type="password" 
                                placeholder="Contraseña"
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="editUser">
                                    {{ __('Modificar cuenta') }}
                                </button>
                                <a href="{{ route('DeleteUser') }}">
                                    <button type="button" class="btn btn-danger" value="DeleteUser">
                                    {{ __('Eliminar cuenta') }}
                                </button></a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection