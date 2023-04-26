@extends('layouts.default')
@section('title','properties')

@section('content')
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
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                {{-- ***************** display images start ***************** --}}
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($property->images as $image)
                            <div class="carousel-item active">
                                <img src="{{asset('/storage/'. $image->path)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                {{-- ***************** display images end ****************** --}}
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $property->title }}</h1>
                        <p class="card-text">{{ $property->description }}</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="card-text"><strong>Surface:</strong> {{ $property->surface }} m²</p>
                                <p class="card-text"><strong>Rooms:</strong> {{ $property->rooms }}</p>
                                <p class="card-text"><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="card-text"><strong>Price:</strong> {{number_format($property->price , 2)}} MAD
                                </p>
                                <p class="card-text"><strong>City:</strong> {{ $property->city }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $property->address }}</p>
                            </div>
                        </div>
                        <p class="card-text"><strong>Sold:</strong> {{ $property->sold ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2>specification</h2>
                <ul class="list-group">

                    @foreach($property->options as $option)
                        <li class="list-group-item">{{$option->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Request to Buy</h3>
                        <form method="POST" action="{{ route('properties.buy', $property) }}">
                            @csrf
                            <x-form.input name="name" label="name" id="name" placeholder="name"/>
                            <x-form.input name="email" label="email" id="email" placeholder="email"/>
                            <x-form.input name="phone" label="phone" id="phone" placeholder="phone"/>
                            <x-form.textarea name="message" label="message" id="message" placeholder="message"/>
                            <button type="submit" class="btn btn-primary">Send Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
