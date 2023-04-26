<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/properties', \App\Http\Controllers\PropertyController::class)->names('properties')->except(['store', 'update', 'edit', 'destroy']);
Route::post('properties/buy/{property}', [\App\Http\Controllers\PropertyController::class, 'buy'])->name('properties.buy');
Route::get('login', [AuthController::class, 'index'])
    ->middleware('guest')
    ->name('auth.index');
Route::post('login', [AuthController::class, 'store'])
    ->middleware('guest')
    ->name('auth.store');
Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::resource('properties', PropertyController::class)->names('properties')->except(['show']);
    Route::resource('options', OptionController::class)->names('options')->except(['show']);
});

