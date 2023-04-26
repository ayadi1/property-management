@extends('layouts.dashboard')

@section('title','dashboard options')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

@section('content')
    <h1>options</h1>


    <div class="card mt-3">
        <div class="card-header d-flex">
            <a class="ms-auto btn btn-primary" href="{{route('dashboard.options.create')}}">create</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>name</th>
                    <th class="text-end" >actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($options as $option)
                    <tr>
                        <td>{{Str::limit($option->name,40)}}</td>
                        <td class="d-flex gap-1 justify-content-end" >
                            <a role="button" href="{{route('dashboard.options.edit' , $option)}}"
                               class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route('dashboard.options.destroy',$option)}}" method="post" onsubmit="return confirm('are you sure')" >
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
                {{$options->links()}}
            </div>
        </div>
    </div>
@endsection
