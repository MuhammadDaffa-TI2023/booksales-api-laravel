<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::get('/', [BookController::class, 'index']);
Route::get('/genre', [BookController::class, 'index'])->name('books.index');
Route::get('/author', [AuthorController::class, 'index'])->name('authors.index');
