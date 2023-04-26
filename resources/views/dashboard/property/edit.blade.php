@extends('layouts.dashboard')

@section('title','update properties')


@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <h1>Update Property</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    @include('dashboard.property.form')
                </div>
                <div class="col-4">
                    <form class="border p-2 rounded" method="post" enctype="multipart/form-data" action="{{route('dashboard.properties.addImageToProperty',$property)}}">
                        @csrf
                        <x-form.input-file label="images" placeholder="images" multiple="true" id="images" name="images[]"
                                           type="file"/>
                        <button class="btn btn-primary w-100">add</button>
                    </form>
                    @foreach($property->images as $image)
                        <div class="card mt-3">
                            <img src="{{asset('/storage/'. $image->path)}}" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <form method="post"
                                      onsubmit="return confirm('are you sure!')"
                                      action="{{route('dashboard.properties.deleteImageFromProperty',['property'=>$property,'imageId'=>$image->id])}}">
                                    <button class="btn btn-danger w-100"><i class="fa-solid fa-trash"></i></button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
