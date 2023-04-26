<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::query()->latest('id')->limit(4)->get();
        return view('welcome', [
            'properties' => $properties
        ]);
    }


    public function properties(): View|ApplicationAlias|Factory|Application
    {
        $properties = Property::latest('id')->paginate(25);
        return view('property.index', [
            'properties' => $properties
        ]);
    }
}
