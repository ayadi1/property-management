@extends('layouts.dashboard')

@section('title','add new properties')


@section('content')
    <h1>add new property</h1>

    <div class="card">
        <div class="card-body">
            @include('dashboard.property.form')
        </div>
    </div>

@endsection
