@props(['label'=>null,'id','value'=>'','placeholder','name' , 'multiple'=>false])
<div {{$attributes->merge(['class'=>'form-group mb-3'])}}>
    @if($label)
        <label for="{{$id}}">{{$label}} :</label>
    @endif
    <input type="file" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}"
           class="form-control  @error($name) is-invalid @enderror " multiple="{{$multiple}}">
    @error($name)
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
