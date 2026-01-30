<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', \App\Http\Controllers\EventController::class);
Route::get('/dashboard', [EventController::class, 'dashboard']);