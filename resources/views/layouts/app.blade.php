<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700|Poppins:600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app" class="d-flex flex-column flex-grow-1">

        <nav class="navbar navbar-expand-md navbar-dark shadow-sm blog-navbar">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <i class="bi bi-pen-fill me-2"></i>{{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="bi bi-house me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('blog.*') || request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                                <i class="bi bi-journal-text me-1"></i>Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                <i class="bi bi-info-circle me-1"></i>About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                <i class="bi bi-envelope me-1"></i>Contact
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-light btn-sm ms-2" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @auth
                                        <a class="dropdown-item" href="{{ route('posts.create') }}">
                                            <i class="bi bi-plus-circle me-2"></i>New Post
                                        </a>
                                        <hr class="dropdown-divider">
                                    @endauth
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
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
        </nav>

        <main class="flex-grow-1">
            @yield('content')
        </main>

        <footer class="blog-footer text-white mt-auto">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5 class="fw-bold mb-3"><i class="bi bi-pen-fill me-2"></i>{{ config('app.name', 'Laravel Blog') }}</h5>
                        <p class="text-muted">A modern blogging platform built with Laravel. Share your coding journey, tutorials, and experiences.</p>
                    </div>
                    <div class="col-md-2 mb-4 mb-md-0">
                        <h6 class="fw-bold mb-3">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                            <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-muted text-decoration-none">Blog</a></li>
                            <li class="mb-2"><a href="{{ route('about') }}" class="text-muted text-decoration-none">About</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}" class="text-muted text-decoration-none">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-4 mb-md-0">
                        <h6 class="fw-bold mb-3">Resources</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="https://laravel.com/docs" target="_blank" class="text-muted text-decoration-none">Laravel Docs</a></li>
                            <li class="mb-2"><a href="https://github.com" target="_blank" class="text-muted text-decoration-none">GitHub</a></li>
                            <li class="mb-2"><a href="https://laracasts.com" target="_blank" class="text-muted text-decoration-none">Laracasts</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-bold mb-3">Connect</h6>
                        <div class="d-flex gap-3 fs-4">
                            <a href="#" class="text-muted"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-github"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4 border-secondary">
                <div class="text-center text-muted">
                    <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel Blog') }}. Built with <i class="bi bi-heart-fill text-danger"></i> using Laravel.</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
