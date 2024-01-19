<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/6f78ace1ca.js" crossorigin="anonymous"></script>
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand me-auto ms-3" href="{{ url('/') }}">Revista IoT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto ms-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show') }}">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('art.show') }}">
                        <i class="fa-solid fa-palette"></i> Art
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tech.show') }}">
                        <i class="fa-solid fa-microchip"></i> Tech
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('science.show') }}">
                        <i class="fa-solid fa-flask"></i> Science
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fashion.show') }}">
                        <i class="fa-solid fa-vest"></i> Fashion
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav me-3">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> {{ Auth::user()->username }}
                        </button>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->hasRole(4))
                                <a class="dropdown-item" href="{{ route('admin.panel') }}">Admin Panel</a>
                            @endif
                            @if(Auth::user()->hasRole(2))
                                <a class="dropdown-item" href="{{ route('article.show') }}">New Article</a>
                                <a class="dropdown-item" href="{{ route('user.articles') }}">Your Articles</a>
                            @endif
                            @if(Auth::user()->hasRole(3))
                                    <a class="dropdown-item" href="{{ route('editor.pending.articles') }}">Pending Articles</a>
                            @endif
                            @if(auth()->user())
                                <a class="dropdown-item" href="{{ route('profile.page') }}">Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<footer class="bg-warning text-center text-lg-start mt-auto">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark" href="{{ url('/') }}">Revista IOT</a>
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>
