<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::get('/', [BooksController::class, 'index']);
Route::resource('books', BooksController::class);
