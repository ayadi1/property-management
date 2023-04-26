<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|FactoryAlias|Application
    {
        $options = Option::latest('id')->paginate(25);
        return view('dashboard.option.index', [
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Foundation\Application|FactoryAlias|Application
    {
        $option = new Option();
        return view('dashboard.option.create', [
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request): RedirectResponse
    {
        Option::create($request->validated());
        return redirect()->route('dashboard.options.index')
            ->with('success', 'option created with successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option): View|\Illuminate\Foundation\Application|FactoryAlias|Application
    {
        return view('dashboard.option.create', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, Option $option): RedirectResponse
    {
        $option->update($request->validated());
        return redirect()->route('dashboard.options.index')
            ->with('success', 'option updated with successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option): RedirectResponse
    {
        $option->delete();
        return redirect()->route('dashboard.options.index')
            ->with('success', 'option deleted with successfully');
    }
}
