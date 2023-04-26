@props(['label','id','value'=>'','placeholder', 'name'])
<div {{$attributes->merge(['class'=>'form-group mb-3'])}}>
    @if($label)
        <label for="{{$id}}">{{$label}} :</label>
    @endif
    <textarea name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}"
              class="form-control @error($name) is-invalid @enderror ">{{old($name,$value)}}</textarea>
    @error($name)
    <div class="invalid-feedback fs-6">{{$message}}</div>
    @enderror
</div>
