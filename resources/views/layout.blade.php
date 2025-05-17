{{-- filepath: c:\Users\Alejandro\Documents\MEGA\2º DAW DAM\Desarrollo aplicaciones web servidor\proyecto_laravel\reforesta\resources\views\layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
            height: 30px;
        }
        .navbar-gradient {
            background: linear-gradient(90deg, #3e8e41 0%, #8d5524 100%);
        }
        .btn-warning.btn-sm:hover {
            background-color: #d39e00 !important;
            color: #fff !important;
        }
        .btn-danger.btn-sm:hover {
            background-color: #b52a2a !important;
            color: #fff !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('eventos.index') }}">
                <img src="{{ asset('storage/reforesta.png') }}" alt="Logo Reforesta" width="auto" height="40" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end navbar-gradient" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto">
                        {{-- Usuarios --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
                                <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Listar usuarios</a></li>
                                <li><a class="dropdown-item" href="{{ route('usuarios.create') }}">Añadir usuario</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('usuarios.create') }}">Registrar usuario</a></li>
                            </ul>
                        </li>
                        {{-- Eventos --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="eventosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Eventos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="eventosDropdown">
                                <li><a class="dropdown-item" href="{{ route('eventos.index') }}">Listar eventos</a></li>
                                <li><a class="dropdown-item" href="{{ route('eventos.create') }}">Añadir evento</a></li>
                            </ul>
                        </li>
                        {{-- Especies --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="especiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Especies
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="especiesDropdown">
                                <li><a class="dropdown-item" href="{{ route('especies.index') }}">Listar especies</a></li>
                                <li><a class="dropdown-item" href="{{ route('especies.create') }}">Añadir especie</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Logros</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <span class="navbar-text text-white me-3">
                                    Bienvenido, {{ auth()->user()->nick }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-warning btn-sm">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4 main-content">
        @yield('content')
    </div>
    <footer class="bg-light text-center text-muted py-3 mt-5 border-top">
        <div>
            © {{ date('Y') }} Alejandro Mazario · Proyecto Reforesta · Desarrollo de Aplicaciones Web
        </div>
    </footer>
</body>
</html>