{{-- filepath: c:\Users\Alejandro\Documents\MEGA\2º DAW DAM\Desarrollo aplicaciones web servidor\proyecto_laravel\reforesta\resources\views\especies\create.blade.php --}}
@extends('layout')

@section('titulo', 'Editar Especie')

@section('content')
    <div>
        <h1>Editar Especie</h1>
        
        <form action="{{ route('especies.update', $especie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_cientifico">Nombre Científico:</label>
                <input type="text" class="form-control" name="nombre_cientifico" id="nombre_cientifico"
                    value="{{ old('nombre_cientifico', $especie->nombre_cientifico) }}">
                @if ($errors->has('nombre_cientifico'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre_cientifico') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="4">{{ old('descripcion', $especie->descripcion) }}</textarea>
                @if ($errors->has('descripcion'))
                    <div class="alert alert-danger">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="clima">Clima:</label>
                <input type="text" class="form-control" name="clima" id="clima"
                    value="{{ old('clima', $especie->clima) }}">
                @if ($errors->has('clima'))
                    <div class="alert alert-danger">
                        {{ $errors->first('clima') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="region">Región:</label>
                <input type="text" class="form-control" name="region" id="region"
                    value="{{ old('region', $especie->region) }}">
                @if ($errors->has('region'))
                    <div class="alert alert-danger">
                        {{ $errors->first('region') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="tiempo_adulto">Tiempo para alcanzar la adultez (en años):</label>
                <input type="number" class="form-control" name="tiempo_adulto" id="tiempo_adulto"
                    value="{{ old('tiempo_adulto', $especie->tiempo_adulto) }}">
                @if ($errors->has('tiempo_adulto'))
                    <div class="alert alert-danger">
                        {{ $errors->first('tiempo_adulto') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="enlace">Enlace:</label>
                <input type="text" class="form-control" name="enlace" id="enlace"
                    value="{{ old('enlace', $especie->enlace) }}">
                @if ($errors->has('enlace'))
                    <div class="alert alert-danger">
                        {{ $errors->first('enlace') }}
                    </div>
                @endif

            <div class="form-group">
                <label for="imagen">Imagen de la Especie:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                @if ($errors->has('imagen'))
                    <div class="alert alert-danger">
                        {{ $errors->first('imagen') }}
                    </div>
                @endif
            </div>

            @if ($beneficiosAsociados->isNotEmpty())
                <div class="form-group">
                    <label for="beneficios_asociados">Beneficios a borrar:</label>
                    <select class="form-control" name="beneficios_asociados[]" id="beneficios_asociados" multiple>
                        @foreach($beneficiosAsociados as $beneficio)
                            <option value="{{ $beneficio->beneficio_id }}">
                                {{ $beneficio->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('beneficios_asociados'))
                        <div class="alert alert-danger">
                            {{ $errors->first('beneficios_asociados') }}
                        </div>
                    @endif
                </div>
            @endif

            @if ($beneficiosNoAsociados->isNotEmpty())
                <div class="form-group">
                    <label for="beneficios_no_asociados">Beneficios a añadir:</label>
                    <select class="form-control" name="beneficios_no_asociados[]" id="beneficios_no_asociados" multiple>
                        @foreach($beneficiosNoAsociados as $beneficio)
                            <option value="{{ $beneficio->beneficio_id }}">
                                {{ $beneficio->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('beneficios_no_asociados'))
                        <div class="alert alert-danger">
                            {{ $errors->first('beneficios_no_asociados') }}
                        </div>
                    @endif
                </div>
            @endif

            <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
        </form>
    </div>
@endsection