@extends('layout')

@section('titulo', 'Listar Usuarios')

@section('content')
    <div class="container">
        <h1 class="mb-4">Usuarios</h1>
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-4">Crear usuario</a>

        <ul class="nav nav-tabs mb-4" id="usuariosTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button" role="tab" aria-controls="admins" aria-selected="true">
                    Administradores
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="normales-tab" data-bs-toggle="tab" data-bs-target="#normales" type="button" role="tab" aria-controls="normales" aria-selected="false">
                    Usuarios normales
                </button>
            </li>
        </ul>
        <div class="tab-content" id="usuariosTabContent">
            <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="admins-tab" tabindex="0">
                <div class="row">
                    @forelse($usuarios->where('is_admin', true) as $usuario)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    @if ($usuario->avatar)
                                        <img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Avatar" class="img-fluid rounded-circle" width="100">
                                    @else
                                        <img src="{{ asset('storage/avatars/default.jpg') }}" alt="Avatar" class="img-fluid rounded-circle" width="100">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $usuario->nombre }} {{ $usuario->apellidos }}</h5>
                                    <p class="card-text">
                                        <strong>Id:</strong> {{ $usuario->id }} <br>
                                        <strong>Email:</strong> {{ $usuario->email }} <br>
                                        <strong>Nick:</strong> {{ $usuario->nick }} <br>
                                        <strong>Karma:</strong> {{ $usuario->karma }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    @if ($usuario->eventosPropuestos->isNotEmpty()) disabled @endif>
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @if ($usuario->eventosPropuestos->isNotEmpty())
                                    <div class="card-footer">
                                        <strong>Eventos propuestos:</strong>
                                        <ul class="list-unstyled">
                                            @foreach($usuario->eventosPropuestos as $evento)
                                                <li>Id: {{ $evento->id }} - {{ $evento->nombre }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="card-footer text-muted text-center">
                                        No es anfitrión
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">No hay administradores</div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="tab-pane fade" id="normales" role="tabpanel" aria-labelledby="normales-tab" tabindex="0">
                <div class="row">
                    @forelse($usuarios->where('is_admin', false) as $usuario)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    @if ($usuario->avatar)
                                        <img src="{{ asset('storage/' . $usuario->avatar) }}" alt="Avatar" class="img-fluid rounded-circle" width="100">
                                    @else
                                        <img src="{{ asset('storage/avatars/default.jpg') }}" alt="Avatar" class="img-fluid rounded-circle" width="100">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $usuario->nombre }} {{ $usuario->apellidos }}</h5>
                                    <p class="card-text">
                                        <strong>Id:</strong> {{ $usuario->id }} <br>
                                        <strong>Email:</strong> {{ $usuario->email }} <br>
                                        <strong>Nick:</strong> {{ $usuario->nick }} <br>
                                        <strong>Karma:</strong> {{ $usuario->karma }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    @if ($usuario->eventosPropuestos->isNotEmpty()) disabled @endif>
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @if ($usuario->eventosPropuestos->isNotEmpty())
                                    <div class="card-footer">
                                        <strong>Eventos propuestos:</strong>
                                        <ul class="list-unstyled">
                                            @foreach($usuario->eventosPropuestos as $evento)
                                                <li>Id: {{ $evento->id }} - {{ $evento->nombre }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="card-footer text-muted text-center">
                                        No es anfitrión
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">No hay usuarios normales</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
