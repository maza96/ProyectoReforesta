@extends('layout')

@section('titulo', 'Listar Eventos')

@section('content')
    <div class="container">
        <h1 class="mb-4">Eventos de Reforestación</h1>
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        <div class="row">
            {{-- Acordeón de noticias --}}
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-newspaper me-2"></i>Últimas Noticias</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="accordion accordion-flush" id="noticiasAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="noticia1-heading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#noticia1" aria-expanded="true" aria-controls="noticia1">
                                        Nueva campaña de reforestación en la Sierra
                                    </button>
                                </h2>
                                <div id="noticia1" class="accordion-collapse collapse show" aria-labelledby="noticia1-heading" data-bs-parent="#noticiasAccordion">
                                    <div class="accordion-body">
                                        Más de 500 voluntarios participarán este mes en la plantación de árboles autóctonos en la Sierra. El objetivo es recuperar zonas afectadas por incendios y concienciar sobre la importancia de la biodiversidad. Se espera plantar más de 2.000 ejemplares de diferentes especies.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="noticia2-heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#noticia2" aria-expanded="false" aria-controls="noticia2">
                                        Descubren nueva especie en el bosque local
                                    </button>
                                </h2>
                                <div id="noticia2" class="accordion-collapse collapse" aria-labelledby="noticia2-heading" data-bs-parent="#noticiasAccordion">
                                    <div class="accordion-body">
                                        Investigadores de la Universidad Regional han identificado una nueva especie de planta que ayudará a la biodiversidad de la zona. El hallazgo ha sido publicado en una revista científica y se espera que contribuya a futuros proyectos de conservación.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="noticia3-heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#noticia3" aria-expanded="false" aria-controls="noticia3">
                                        Talleres educativos para jóvenes
                                    </button>
                                </h2>
                                <div id="noticia3" class="accordion-collapse collapse" aria-labelledby="noticia3-heading" data-bs-parent="#noticiasAccordion">
                                    <div class="accordion-body">
                                        Se impartirán talleres sobre la importancia de los bosques y la reforestación en colegios de la región. Los estudiantes aprenderán técnicas de plantación y el impacto positivo de cuidar el entorno natural.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="noticia4-heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#noticia4" aria-expanded="false" aria-controls="noticia4">
                                        Jornada de limpieza en el río principal
                                    </button>
                                </h2>
                                <div id="noticia4" class="accordion-collapse collapse" aria-labelledby="noticia4-heading" data-bs-parent="#noticiasAccordion">
                                    <div class="accordion-body">
                                        Este sábado se organizará una jornada de limpieza en el río principal del municipio. Se invita a toda la comunidad a participar y contribuir a la mejora del ecosistema acuático. Habrá premios para los grupos más activos y un picnic al finalizar la actividad.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="noticia5-heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#noticia5" aria-expanded="false" aria-controls="noticia5">
                                        Nueva app para seguimiento de árboles plantados
                                    </button>
                                </h2>
                                <div id="noticia5" class="accordion-collapse collapse" aria-labelledby="noticia5-heading" data-bs-parent="#noticiasAccordion">
                                    <div class="accordion-body">
                                        Ya está disponible una nueva aplicación móvil que permite a los voluntarios registrar y hacer seguimiento de los árboles plantados en las campañas de reforestación. La app incluye mapas interactivos, estadísticas y la posibilidad de compartir fotos del crecimiento de los árboles.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin acordeón de noticias --}}

            <div class="col-lg-8">
                <div class="row">
                    @forelse($eventos as $evento)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    @php
                                        $archivoUrl = null;
                                        $extension = null;
                                    @endphp
                                    @if ($evento->archivo)
                                        @php
                                            $archivoUrl = asset('storage/' . $evento->archivo);
                                            $extension = pathinfo($archivoUrl, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ $archivoUrl }}" alt="Imagen del evento" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/archivos/default_evento.jpg') }}" alt="Imagen del evento" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/archivos/default_evento.jpg') }}" alt="Imagen del evento" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $evento->nombre }}</h5>
                                    <p class="card-text">
                                        <strong>Id:</strong> {{ $evento->id }} <br>
                                        <strong>Fecha:</strong> {{ $evento->fecha }} <br>
                                        <strong>Ubicación:</strong> {{ $evento->ubicacion }} <br>
                                        <strong>Descripción:</strong> {{ $evento->descripcion }} <br>
                                        <strong>Tipo de evento:</strong> {{ $evento->tipo_evento }} <br>
                                        <strong>Tipo de terreno:</strong> {{ $evento->tipo_terreno }}
                                        @if ($extension === 'pdf')
                                            <br>
                                            <a href="{{ $archivoUrl }}" target="_blank" class="btn btn-info btn-sm">Ver PDF</a>
                                        @endif
                                    </p>
                                    <p class="card-text">
                                        <strong>Organizador:</strong> {{ $evento->anfitrion->nombre }} <br>
                                        <strong>Email:</strong> {{ $evento->anfitrion->email }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Especies:</strong>
                                        <ul>
                                            @forelse($evento->especies as $especie)
                                                <li>{{ $especie->nombre_cientifico }} (Cantidad: {{ $especie->pivot->cantidad }})</li>
                                            @empty
                                                <li>No hay especies</li>
                                            @endforelse
                                        </ul>
                                    </p>
                                    <p class="card-text">
                                        <strong>Asistentes:</strong>
                                        <ul>
                                            @forelse($evento->participantes as $asistente)
                                                <li>{{ $asistente->nombre }} ({{ $asistente->email }})</li>
                                            @empty
                                                <li>No hay asistentes</li>
                                            @endforelse
                                        </ul>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">No hay eventos</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
