@extends('layout')

@section('titulo', 'Insertar Eventos')

@section('content')
    <div>
        <h1>Insertar Eventos</h1>
        
        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre"
                    value="{{ old('nombre') }}">
                @if ($errors->has('nombre'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha"
                    value="{{ old('fecha') }}">
                @if ($errors->has('fecha'))
                    <div class="alert alert-danger">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion"
                    value="{{ old('ubicacion') }}">
                @if ($errors->has('ubicacion'))
                    <div class="alert alert-danger">
                        {{ $errors->first('ubicacion') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="tipo_evento">Tipo de Evento:</label>
                <input type="text" class="form-control" name="tipo_evento" id="tipo_evento"
                    value="{{ old('tipo_evento') }}">
                @if ($errors->has('tipo_evento'))
                    <div class="alert alert-danger">
                        {{ $errors->first('tipo_evento') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="tipo_terreno">Tipo de Terreno:</label>
                <input type="text" class="form-control" name="tipo_terreno" id="tipo_terreno"
                    value="{{ old('tipo_terreno') }}">
                @if ($errors->has('tipo_terreno'))
                    <div class="alert alert-danger">
                        {{ $errors->first('tipo_terreno') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                @if ($errors->has('descripcion'))
                    <div class="alert alert-danger">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="anfitrion_id">Anfitrión:</label>
                <select class="form-control" name="anfitrion_id" id="anfitrion_id">
                    <option value="" disabled selected>Seleccione un anfitrión</option>
                    @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ old('anfitrion_id') == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->nombre }} {{ $usuario->apellidos }}
                </option>
                    @endforeach
                </select>
                @if ($errors->has('anfitrion_id'))
                    <div class="alert alert-danger">
                        {{ $errors->first('anfitrion_id') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="archivo">Adjuntar Imagen o PDF:</label>
                <input type="file" class="form-control" name="archivo" id="archivo" accept="image/*,application/pdf">
                @if ($errors->has('archivo'))
                    <div class="alert alert-danger">
                        {{ $errors->first('archivo') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="participantes">Participantes:</label>
                <select name="participantes[]" multiple class="form-control">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ in_array($usuario->id, old('participantes', [])) ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellidos }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('participantes'))
                    <div class="alert alert-danger">
                        {{ $errors->first('participantes') }}
                    </div>
                @endif
            </div>

            <h3>Especies y Cantidades</h3>
            @foreach($especies as $especie)
                <div class="form-group">
                    <label for="especie_{{ $especie->id }}">{{ $especie->nombre_cientifico }}</label>
                    <input type="number" name="especies[{{ $especie->id }}]" id="especie_{{ $especie->id }}" class="form-control" placeholder="0" value="{{ old('especies.' . $especie->id) ?? 0 }}">
                    @if ($errors->has('especies.' . $especie->id))
                        <div class="alert alert-danger">
                            {{ $errors->first('especies.' . $especie->id) }}
                        </div>
                    @endif
                </div>
            @endforeach
            

            <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
        </form>
    </div>
@endsection
