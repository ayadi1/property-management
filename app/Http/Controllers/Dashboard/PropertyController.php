<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePropertyRequest;
use App\Http\Requests\Dashboard\UpdatePropertyRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;

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
            'property' => $property,
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
}
