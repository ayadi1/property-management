@props(['property'])

<div {{$attributes->merge(['class'=>'col-md-3'])}} >
    <div class="card">
        {{-- ***************** display images start ***************** --}}
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach($property->images as $image)
                    <div class="carousel-item active">
                        <img src="{{asset('/storage/'. $image->path)}}" class="card-img-top" alt="...">
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

        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('properties.show' , $property)}}">{{Str::limit($property->title,20)}}</a>
            </h5>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <span>price :</span>
                <span>{{number_format($property->price , 2)}} MAD</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>city :</span>
                <span>{{$property->city}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>surface :</span>
                <span>{{$property->surface}}m²</span>
            </li>
        </ul>
    </div>
</div>
