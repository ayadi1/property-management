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
                    <a class="nav-link @if(Str::contains($route ,'dashboard.properties.')) active @endif "
                       href={{route('dashboard.properties.index')}}>Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Str::contains($route ,'dashboard.options.')) active @endif "
                       href={{route('dashboard.options.index')}}>Options</a>
                </li>
            </ul>
            <ul class="ms-auto navbar-nav">
                <li class="nav-item">
                    <form method="post" action="{{route('auth.logout')}}">
                        @csrf
                        <button class="btn">logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div id="main" class="row">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session()->get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <footer class="row">
        @include('includes.footer')
        @stack('javascript')
    </footer>
</div>
</body>
</html>
