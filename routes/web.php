<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CountryController::class,'index']);
Route::get('/country-list',[CountryController::class,'show'])->name('country.list');
Route::post('/add-country',[CountryController::class,'store'])->name('add.country');

