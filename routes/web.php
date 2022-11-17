<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CountryController::class,'index']);
Route::get('/country-list',[CountryController::class,'show'])->name('country.list');
Route::post('/add-country',[CountryController::class,'store'])->name('add.country');
Route::get('/edit-country',[CountryController::class,'edit'])->name('edit.country');
Route::post('/update-country',[CountryController::class,'update'])->name('update.country');


// Route::resource('/country',CountryController::class);

