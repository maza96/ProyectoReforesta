@extends('layout')

@section('titulo', 'Editar Usuarios')

@section('content')
    <div>
        <h1>Editar Usuarios</h1>
        
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" 
                    value="{{ old('nombre', $usuario->nombre) }}">
                @if ($errors->has('nombre'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos"
                    value="{{ old('apellidos', $usuario->apellidos) }}">
                @if ($errors->has('apellidos'))
                    <div class="alert alert-danger">
                        {{ $errors->first('apellidos') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="nick">Nick:</label>
                <input type="text" class="form-control" name="nick" id="nick"
                    value="{{ old('nick', $usuario->nick) }}">
                @if ($errors->has('nick'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nick') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', $usuario->email) }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Dejar en blanco si no se desea cambiar">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Password:</label>
                <input type="password" class="form-control" name="password_confirmation" 
                    id="password_confirmation" value="{{ old('password_confirmation') }}">
                @if ($errors->has('password_confirmation'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="karma">Karma:</label>
                <input type="number" class="form-control" name="karma" id="karma"
                    value="{{ old('karma', $usuario->karma) }}">
                @if ($errors->has('karma'))
                    <div class="alert alert-danger">
                        {{ $errors->first('karma') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="archivo">Adjuntar Imagen: </label>
                <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*">
                @if ($errors->has('archivo'))
                    <div class="alert alert-danger">
                        {{ $errors->first('archivo') }}
                    </div>
                @endif
            </div>
    
    
            <input type="submit" name="enviar" value="Actualizar">

    
        </form>
    </div>
@endsection
