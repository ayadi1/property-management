<x-mail::message>
# new buy request

you have new request to buy the property <a href="{{route('properties.show' , $property)}}">{{$property->title}}</a><br>
the request made it by
- Name : {{$data['name']}}
- Email : {{$data['email']}}
- Phone : {{$data['phone']}}

**message :** <br>

{{$data['message']}}

{{ config('app.name') }}
</x-mail::message>
