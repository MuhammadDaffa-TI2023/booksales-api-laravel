<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

// Route untuk login 
Route::post('/login', [AuthController::class, 'login']);

// Route publik 
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}', [AuthorController::class, 'show']);

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{genre}', [GenreController::class, 'show']);

Route::get('books', [BookController::class, 'index']);
Route::get('books/{book}', [BookController::class, 'show']);

Route::get('transactions', [TransactionController::class, 'index']);

// Route khusus admin 
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('books', BookController::class)->except(['index', 'show']);

    // Route ambil user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route transactions untuk user yang login
    Route::apiResource('transactions', TransactionController::class)->except(['index']);
});
