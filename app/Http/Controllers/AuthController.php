<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function store(AuthRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.properties.index'));
        }
        return back()->withErrors([
            'email' => ['No user matching this identifier']
        ])->onlyInput('email');
    }

    public static function logout(): ApplicationAlias|Redirector|RedirectResponse|Application
    {
        Auth::logout();
        return redirect(route('auth.index'));
    }
}
