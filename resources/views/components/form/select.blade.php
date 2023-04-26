@props(['label'=>null,'id','value','name' , 'multiple'=> false , 'options'=>[]])
<div {{$attributes->merge(['class'=>'form-group mb-3'])}}>
    @if($label)
        <label for="{{$id}}">{{$label}} :</label>
    @endif
    <select multiple name="{{$name}}[]" id="{{$id}}">
        @foreach($options as $key=>$v)
            <option value="{{$key}}" @selected($value->contains($key)) >{{$v}}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
