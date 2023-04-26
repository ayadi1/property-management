<form
    action="{{route($property->id?'dashboard.properties.update':'dashboard.properties.store',$property)}}"
    method="post" enctype="multipart/form-data">
    @csrf
    @method($property->id?'patch':'post')
    <div class="row">
        <div class="col">
            <x-form.input label="title" placeholder="title" id="title" name="title" value="{{$property?->title}}"/>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <x-form.input label="surface" placeholder="surface" id="surface" name="surface" type="number"
                                  value="{{$property?->surface}}"/>
                </div>
                <div class="col">
                    <x-form.input label="rooms" placeholder="rooms" id="rooms" name="rooms" type="number"
                                  value="{{$property?->rooms}}"/>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-form.input label="bedrooms" placeholder="bedrooms" id="bedrooms" name="bedrooms" type="number"
                          value="{{$property?->bedrooms}}"/>
        </div>
        <div class="col">
            <x-form.input label="price" placeholder="price" id="price" name="price" type="number"
                          value="{{$property?->price}}"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-form.input label="city" placeholder="city" id="city" name="city"
                          value="{{$property?->city}}"/>
        </div>
        <div class="col-md-6">
            <x-form.input label="address" placeholder="address" id="address" name="address"
                          value="{{$property?->address}}"/>
        </div>
    </div>

    @if(!$property->id)
        <x-form.input-file label="images" placeholder="images" multiple="true" id="images" name="images[]"
                           type="file"/>
    @endif

    <x-form.textarea label="description" placeholder="description" id="description" name="description"
                     value="{{$property?->description}}"/>
    <x-form.checkbox label="sold" id="sold" name="sold"
                     value="{{$property?->sold}}"/>

    <div class="row">
        <div class="col">
            <x-form.select multiple="true" label="options" placeholder="options" id="options" name="options"
                           :options="$options" :value="$property->options()->get()"/>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">
        @if($property->id)
            edit
        @else
            save
        @endif
    </button>
</form>

