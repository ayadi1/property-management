<!doctype html>
<html>

@include('includes.head')

<body>
@php
    $route = request()->route()->getName();
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AgenceAI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if( Str::contains($route,'home')) active @endif " aria-current="page"
                       href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Str::contains($route ,'properties.')) active @endif "
                       href={{route('properties.index')}}>Property</a>
                </li>
            </ul>
            @auth
                <ul class="ms-auto navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('dashboard.properties.index')}}">dashboard</a>
                    </li>
                </ul>
            @endauth
            @guest
                <ul class="ms-auto navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('auth.index')}}">login</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>

<div class="container">
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('includes.footer')
        @stack('javascript')

    </footer>
</div>
</body>
</html>
