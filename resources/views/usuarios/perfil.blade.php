{{-- filepath: c:\Users\Alejandro\Documents\MEGA\2º DAW DAM\Desarrollo aplicaciones web servidor\reforesta\resources\views\usuarios\perfil.blade.php --}}
@extends('layout')

@section('titulo', 'Perfil de Usuario')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Perfil de Usuario</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{ $usuario->nick }}</h3>
                    </div>
                    <div class="card-body text-center">
                        {{-- Mostrar avatar del usuario --}}
                        <div class="mb-4">
                            @if ($usuario->avatar)
                                <img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Avatar de {{ $usuario->nick }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/avatars/default.jpg') }}" alt="Avatar por defecto" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                        </div>
                        {{-- Información del usuario --}}
                        <p><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellidos }}</p>
                        <p><strong>Email:</strong> {{ $usuario->email }}</p>
                        <p><strong>Karma:</strong> {{ $usuario->karma }}</p>
                        <p><strong>Fecha de creación:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Última actualización:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar Perfil</a>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection