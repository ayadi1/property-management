@props(['label'=>null,'id','value'=>'','placeholder','type'=>'text','name'])
<div {{$attributes->merge(['class'=>'form-group mb-3'])}}>
    @if($label)
        <label for="{{$id}}">{{$label}} :</label>
    @endif
    <input type="{{$type}}" name="{{$name}}" id="{{$id}}" value="{{old($name,$value)}}" placeholder="{{$placeholder}}"
           class="form-control  @error($name) is-invalid @enderror   ">
    @error($name)
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
