<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

// Endpoint untuk menampilkan semua buku
Route::get('/books', [BookController::class, 'index']);

// Endpoint untuk menampilkan semua author
Route::get('/authors', [AuthorController::class, 'index']);
