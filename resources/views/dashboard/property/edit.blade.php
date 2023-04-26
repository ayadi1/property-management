@extends('layouts.dashboard')

@section('title','update properties')


@section('content')
    <h1>update property</h1>

    <div class="card">
        <div class="card-body">
            @include('dashboard.property.form')
        </div>
    </div>
@endsection
