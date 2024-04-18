<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function(){
//     dd("Hello Laravel 11");
// });

// Route::resource('books', BooksController::class);
