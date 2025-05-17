@extends('layout')

@section('titulo', 'Listar Especies')

@section('content')

    <div class="container">
        <h1 class="mb-4">Especies</h1>
        {{-- Carousel de imágenes --}}
        <div id="especiesCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/archivos/default_especie.jpg') }}" class="d-block w-100" alt="Especie por defecto" style="max-height: 350px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Protege la naturaleza: cada especie cuenta para el equilibrio del planeta</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/archivos/default_evento.jpg') }}" class="d-block w-100" alt="Evento por defecto" style="max-height: 350px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Promueve la reforestación: participa en eventos y haz crecer el futuro</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#especiesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#especiesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        {{-- Fin carousel --}}

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        <div class="row">
            @forelse($especies as $especie)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title">{{ $especie->nombre_cientifico }}</h5>
                        </div>
                        <div class="card-body">
                            {{-- Mostrar imagen de la especie o una por defecto --}}
                            <div class="text-center mb-3">
                                @if ($especie->foto)
                                    <img src="{{ asset('storage/' . $especie->foto) }}" alt="Imagen de {{ $especie->nombre_cientifico }}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/archivos/default_especie.jpg') }}" alt="Imagen por defecto" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                @endif
                            </div>
                            <p class="card-text">
                                <strong>Descripción:</strong> {{ $especie->descripcion }} <br>
                                <strong>Clima:</strong> {{ $especie->clima }} <br>
                                <strong>Región:</strong> {{ $especie->region }} <br>
                                <strong>Tiempo para alcanzar la adultez:</strong> {{ $especie->tiempo_adulto }} años
                            </p>
                            <p class="card-text">
                                <strong>Eventos en los que se usa:</strong>
                                <ul>
                                    @forelse($especie->eventos as $evento)
                                        <li>{{ $evento->nombre }}</li>
                                    @empty
                                        <li>No hay eventos asociados</li>
                                    @endforelse
                                </ul>
                            </p>
                            <p class="card-text">
                                <strong>Beneficios:</strong>
                                <ul>
                                    @forelse($beneficios->where('especie_id', $especie->id) as $beneficio)
                                        <li>{{ $beneficio->descripcion }}</li>
                                    @empty
                                        <li>No hay beneficios asociados</li>
                                    @endforelse
                                </ul>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('especies.edit', $especie->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <form action="{{ route('especies.destroy', $especie->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                            @if ($especie->enlace)
                                <a href="{{ $especie->enlace }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="bi bi-info-circle"></i> Más información
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">No hay especies registradas</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
