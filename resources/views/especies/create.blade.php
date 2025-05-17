{{-- filepath: c:\Users\Alejandro\Documents\MEGA\2º DAW DAM\Desarrollo aplicaciones web servidor\proyecto_laravel\reforesta\resources\views\especies\create.blade.php --}}
@extends('layout')

@section('titulo', 'Insertar Especie')

@section('content')
    <div>
        <h1>Insertar Especie</h1>
        
        <form action="{{ route('especies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre_cientifico">Nombre Científico:</label>
                <input type="text" class="form-control" name="nombre_cientifico" id="nombre_cientifico"
                    value="{{ old('nombre_cientifico') }}">
                @if ($errors->has('nombre_cientifico'))
                    <div class="alert alert-danger">
                        {{ $errors->first('nombre_cientifico') }}
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
                <label for="clima">Clima:</label>
                <input type="text" class="form-control" name="clima" id="clima"
                    value="{{ old('clima') }}">
                @if ($errors->has('clima'))
                    <div class="alert alert-danger">
                        {{ $errors->first('clima') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="region">Región:</label>
                <input type="text" class="form-control" name="region" id="region"
                    value="{{ old('region') }}">
                @if ($errors->has('region'))
                    <div class="alert alert-danger">
                        {{ $errors->first('region') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="tiempo_adulto">Tiempo para alcanzar la adultez (en años):</label>
                <input type="number" class="form-control" name="tiempo_adulto" id="tiempo_adulto"
                    value="{{ old('tiempo_adulto') }}">
                @if ($errors->has('tiempo_adulto'))
                    <div class="alert alert-danger">
                        {{ $errors->first('tiempo_adulto') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="enlace">Enlace:</label>
                <input type="text" class="form-control" name="enlace" id="enlace"
                    value="{{ old('enlace') }}">
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

            <div class="form-group">
                <label for="beneficios">Beneficios:</label>
                <select name="beneficios[]" multiple class="form-control" id="beneficios">
                    @foreach($beneficios as $beneficio)
                        <option value="{{ $beneficio->beneficio_id }}" {{ in_array($beneficio->beneficio_id, old('beneficios', [])) ? 'selected' : '' }}>
                            {{ $beneficio->descripcion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('beneficios'))
                    <div class="alert alert-danger">
                        {{ $errors->first('beneficios') }}
                    </div>
                @endif
            </div>

            <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
        </form>
    </div>
@endsection