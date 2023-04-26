<form
    action="{{route($option->id?'dashboard.options.update':'dashboard.options.store',$option)}}"
    method="post">
    @csrf
    @method($option->id?'patch':'post')
    <x-form.input label="name" placeholder="name" id="name" name="name" value="{{$option?->name}}"/>

    <button class="btn btn-primary" type="submit">
        @if($option->id)
            edit
        @else
            save
        @endif
    </button>
</form>
