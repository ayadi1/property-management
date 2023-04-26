@extends('layouts.dashboard')

@section('title','dashboard properties')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

@section('content')
    <h1>Properties</h1>


    <div class="card mt-3">
        <div class="card-header d-flex">
            <a class="ms-auto btn btn-primary" href="{{route('dashboard.properties.create')}}">create</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>title</th>
                    <th>surface</th>
                    <th>rooms</th>
                    <th>bedrooms</th>
                    <th>price</th>
                    <th>city</th>
                    <th>sold</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{Str::limit($property->title,40)}}</td>
                        <td>{{$property->surface}}m²</td>
                        <td>{{$property->rooms}}</td>
                        <td>{{$property->bedrooms}}</td>
                        <td>{{$property->price}} DH</td>
                        <td>{{$property->city}}</td>
                        <td>
                            @if($property->sold)
                                <span class="badge text-bg-success">not sold yet</span>
                            @else
                                <span class="badge text-bg-danger">sold</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1" >
                            <a role="button" href="{{route('dashboard.properties.edit' , ['property'=>$property->id])}}"
                               class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route('dashboard.properties.destroy',$property)}}" method="post" onsubmit="return confirm('are you sure')" >
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{$properties->links()}}
            </div>
        </div>
    </div>
@endsection
