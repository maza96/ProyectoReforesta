{{-- filepath: c:\Users\Alejandro\Documents\MEGA\2º DAW DAM\Desarrollo aplicaciones web servidor\proyecto_laravel\reforesta\resources\views\auth\login.blade.php --}}
@extends('layout')

@section('titulo', 'Iniciar Sesión')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Iniciar Sesión</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" value="{{ old('email') }}">
                        <label for="email">Correo Electrónico</label>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                        <label for="password">Contraseña</label>
                        @if ($errors->has('password'))
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection