<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ShopController::class, 'index'])->name('shops.index');
Route::get('/{id}', [ShopController::class, 'show'])->name('shops.show');


Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
