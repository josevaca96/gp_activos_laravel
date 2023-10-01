<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('section.head')

<body style="background-color: #f9f9f9">
    <div id="app">
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">
                    <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" title="" /></img></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        @if (Auth::check())
                            @can('activos.index')
                                <li class=""><a href="/">Inicio</a></li>
                            @endcan
                            @can('activos.index')
                                <li class=""><a href="reporte-principal">Reportes</a></li>
                            @endcan
                            @can('mantenimientos.index')
                                <li><a href="{{ route('mantenimientos.index') }}">Mantenimientos</a></li>
                            @endcan
                            @can('asignaciones.index')
                                <li><a href="{{ route('asignaciones.index') }}">Asignaciones</a></li>
                            @endcan
                            @can('activos.index')
                                <li class="menu-has-children"><a>Activos</a>
                                    <ul>
                                        @can('activos.index')
                                            <li><a href="{{ route('activos.index') }}">Activos</a></li>
                                        @endcan
                                        @can('tipo_activos.index')
                                            <li><a href="{{ route('tipo_activos.index') }}">Tipo Activos</a></li>
                                        @endcan
                                        @can('empresas.index')
                                            <li><a href="{{ route('empresas.index') }}">Empresas</a></li>
                                        @endcan
                                        @can('oficinas.index')
                                            <li><a href="{{ route('oficinas.index') }}">Oficina</a></li>
                                        @endcan
                                        @can('departamentos.index')
                                            <li><a href="{{ route('departamentos.index') }}">Departamento</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('roles.index')
                                <li class="menu-has-children"><a>Seguridad</a>
                                    <ul>
                                        @can('roles.index')
                                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                                        @endcan
                                        @can('users.index')
                                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        @endif
                        @guest
                            @if (Route::has('register'))
                                <!-- <li class="menu-active"><a href="{{ route('register') }}">Registrarse</a></li> -->
                            @endif
                        @else
                            <li class="menu-has-children"><a>{{ Auth::user()->name }}</a>
                                <ul>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>
        <main class="p-5">
            @if (session('info'))
                <div class="container-fluid" id="msj">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    @include('section.script')
</body>

</html>




























<!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Grupo Paz
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    @if (Auth::check())
<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('activos.index') }}">Activos</a>
                        </li>
@endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
    @endif
@else
    <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->
