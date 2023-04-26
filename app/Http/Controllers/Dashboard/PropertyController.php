<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePropertyRequest;
use App\Http\Requests\Dashboard\UpdatePropertyRequest;
use App\Models\Option;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|ApplicationAlias|Factory|Application
    {
        $properties = Property::latest('id')->paginate(25);

        return view('dashboard.property.index', [
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|ApplicationAlias|Factory|Application
    {
        $property = new Property();
        return view('dashboard.property.create', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));

        // ***************************** upload image start ***************************** //
        if ($request->hasFile('images')) {
            $this->uploadImageForProperty($request->file('images'), $property);
        }
        // ***************************** upload image end ***************************** //

        return redirect()->route('dashboard.properties.index')->with('success', 'property created with successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property): View|ApplicationAlias|Factory|Application
    {
        return view('dashboard.property.show', [
            'property' => $property
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View|ApplicationAlias|Factory|Application
    {
        return view('dashboard.property.edit', [
            'property' => $property->load(['options', 'images']),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return redirect()->back()->with('success', 'property updated with successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return redirect()->back()->with('success', 'property deleted with successfully');

    }

    /**
     * delete image from storage and property
     * @param Property $property
     * @param string $imageId
     * @return RedirectResponse
     */
    public function deleteImageFromProperty(Property $property, string $imageId): RedirectResponse
    {
        $image = PropertyImage::findOrFail($imageId);
        Storage::delete($image->path);
        $image->delete();
        return back()->with('success', 'image was deleted with successfully');
    }

    /**
     * add image to property
     * @param Request $request
     * @param Property $property
     * @return RedirectResponse
     */
    public function addImageToProperty(Request $request, Property $property): RedirectResponse
    {
        $request->validate([
            'images' => ['required'],
            'images.*' => ['image']
        ]);
        $this->uploadImageForProperty($request->file('images'), $property);
        return back()->with('success', 'images was added with successfully');

    }

    /**
     * upload image form property
     * @param $images
     * @param Property $property
     * @return void
     */
    public function uploadImageForProperty($images, Property $property): void
    {
        foreach ($images as $file) {
            $imagePath = $file->store($property->id);
            PropertyImage::create([
                'path' => $imagePath,
                'property_id' => $property->id
            ]);
        }
    }
}
