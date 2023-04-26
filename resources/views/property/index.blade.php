@extends('layouts.default')

@section('title','show all properties')

@section('content')
    <h1>our all properties</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{route('properties.index')}}" class="d-flex gap-2">
                <input type="number" class="form-control" value="{{request()->input("surface")}}" name="surface"
                       placeholder="surface minimum"/>
                <input type="number" class="form-control" value="{{request()->input("rooms")}}" name="rooms"
                       placeholder="number of rooms minimum"/>
                <input type="number" class="form-control" value="{{request()->input("price")}}" name="price"
                       placeholder="maximum price"/>
                <input type="text" class="form-control" value="{{request()->input("title")}}" name="title"
                       placeholder="title"/>
                <button class="btn btn-primary" type="submit">filter</button>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        @foreach($properties as $property)
            <x-property-card :property="$property" class="mt-3"/>
        @endforeach
        @if($properties->isEmpty())
                <p>no properties match your search.</p>
        @endif
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{$properties->links()}}
    </div>
@endsection
