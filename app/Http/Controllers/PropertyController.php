<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPropertyRequest;
use App\Mail\PropertyBuyMail;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|ApplicationAlias|Factory|Application
    {
        $query = Property::query();

        if ($request->has('price') && $request->input('price')) {
            $query->where('price', '<=', $request->input('price'));
        }

        if ($request->has('surface') && $request->input('surface')) {
            $query->where('surface', '>=', $request->input('surface'));
        }

        if ($request->has('rooms') && $request->input('rooms')) {
            $query->where('rooms', '<=', $request->input('rooms'));
        }

        if ($request->has('title') && $request->input('title')) {
            $title = $request->input('title');
            $query->where('title', 'like', "%$title%");
        }

        $properties = $query->latest('id')->paginate(16)->appends($request->all());
        return view('property.index', [
            'properties' => $properties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function buy(ContactPropertyRequest $request, Property $property)
    {
        Mail::send(new PropertyBuyMail($property, $request->validated()));
        return back()->with('success', 'email has been sent successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('property.show', [
            'property' => $property->load('options')
        ]);
    }
}
