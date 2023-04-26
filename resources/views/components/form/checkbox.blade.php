@props(['label'=>null,'id','value'=>'','placeholder','name'])
<div {{$attributes->merge(['class'=>'form-check form-switch mb-3'])}}>

    <input type="hidden" value="0" name="{{$name}}"  >
    <input type="checkbox" name="{{$name}}" id="{{$id}}" value="1" @checked(old($name,$value))
           class="form-check-input  @error($name) is-invalid @enderror" role="switch" >

    <label for="{{$id}}" class="form-check-label">{{$label}} :</label>
    @error($name)
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
