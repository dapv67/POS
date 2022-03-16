<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'POS') }} | @yield('title')</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('img/ic_nav.svg') }}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main> --}}

        <main>
            @guest
            @else
                <div class="menu">

                    <nav>
                        <a class="navbar-brand" href="#">
                            <!-- <img src="/imgs/logo_blanco.png" alt="" height="150" /> -->
                            <h2>POS</h2>
                        </a>
                        <a>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <hr />
                        <ul class="ul">
                            <li class="item-nav" id="ventas">
                                <a href="{{ route('ventas') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'ventas' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'ventas' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Ventas</a>
                            </li>
                            <li class="item-nav" id="productos">
                                <a href="{{ route('productos') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'productos' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'productos' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Productos</a>
                            </li>
                            <li class="item-nav" id="clientes">
                                <a href="{{ route('clientes') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'clientes' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'clientes' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Clientes</a>
                            </li>
                            <li class="item-nav" id="creditos">
                                <a href="{{ route('creditos') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'creditos' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'creditos' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Créditos</a>
                            </li>
                            <li class="item-nav" id="compras">
                                <a href="{{ route('compras') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'compras' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'compras' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Compras</a>
                            </li>
                            <li class="item-nav" id="cajeras">
                                <a href="{{ route('cajeras') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'cajeras' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'cajeras' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Cajeras</a>
                            </li>
                            <li class="item-nav" id="corte">
                                <a href="{{ route('corte') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'corte' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'corte' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Corte</a>
                            </li>
                            <li class="item-nav" id="reportes">
                                <a href="{{ route('reportes') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'reportes' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'reportes' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Reportes</a>
                            </li>
                            <li class="item-nav" id="prestamos">
                                <a href="{{ route('prestamos') }}"
                                    class="link-nav {{ Route::currentRouteName() == 'prestamos' ? 'active' : '' }}">
                                    <img class="me-2"
                                        src="{{ Route::currentRouteName() == 'prestamos' ? asset('img/ic_nav_blanco.svg') : asset('img/ic_nav.svg') }}"
                                        width="16" height="16" alt="icon-nav" />
                                    Prestamos</a>
                            </li>

                            <li class="item-nav">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endguest
            <div class="contenedor">
                @yield('content')
            </div>
        </main>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                }
            }); 
        </script>

    </div>
</body>

</html>
