<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;


// 🔹 Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// 🔹 Public routes
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}', [AuthorController::class, 'show']);

Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{genre}', [GenreController::class, 'show']);

Route::get('books', [BookController::class, 'index']);
Route::get('books/{book}', [BookController::class, 'show']);

// 🔒 Protected routes (user/admin)
Route::middleware(['auth:sanctum'])->group(function () {

    //  CRUD khusus admin
    Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('books', BookController::class)->except(['index', 'show']);

    //  User info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // TRANSACTION ROUTES
    Route::post('/transactions', [TransactionController::class, 'store']);       // Customer buat transaksi
    Route::get('/transactions', [TransactionController::class, 'index']);        // Admin lihat semua
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);    // Admin/Customer lihat detail
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']); // Admin hapus

    //  Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
