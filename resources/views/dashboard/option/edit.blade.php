@extends('layouts.dashboard')

@section('title','update option')


@section('content')
    <h1>update option</h1>

    <div class="card">
        <div class="card-body">
            @include('dashboard.option.form')
        </div>
    </div>
@endsection
