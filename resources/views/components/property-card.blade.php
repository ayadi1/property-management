@props(['property'])

<div {{$attributes->merge(['class'=>'col-md-3'])}} >
    <div class="card">
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
