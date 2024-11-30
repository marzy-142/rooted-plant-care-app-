<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlantController;

Route::get('/', function () {
    return view('home');
});

Route::resource('plants', PlantController::class);

Route::view('/about', 'about');
Route::view('/contact', 'contact');


