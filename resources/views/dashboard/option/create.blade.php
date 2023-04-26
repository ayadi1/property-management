@extends('layouts.dashboard')

@section('title','create option')


@section('content')
    <h1>create option</h1>

    <div class="card">
        <div class="card-body">
            @include('dashboard.option.form')
        </div>
    </div>
@endsection
