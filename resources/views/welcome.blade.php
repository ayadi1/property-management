@extends('layouts.default')

@section('title' , 'home page')

@section('content')
    <h1>property home</h1>
    <p>loream</p>
    <p>our latest properties</p>
    <div class="row mt-4">
        @foreach($properties as $property)
            <x-property-card :property="$property" class="mt-2" />
        @endforeach
    </div>

@endsection
