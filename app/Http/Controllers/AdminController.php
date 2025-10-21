<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Transaction;

class AdminController extends Controller
{
    // Middleware admin
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'admin']);
    }

    // Endpoint dashboard admin
    public function index()
    {
        $authors = Author::all();
        $books = Book::all();
        $genres = Genre::all();
        $transactions = Transaction::all();

        return response()->json([
            'authors_count' => $authors->count(),
            'books_count' => $books->count(),
            'genres_count' => $genres->count(),
            'transactions_count' => $transactions->count(),
            'authors' => $authors,
            'books' => $books,
            'genres' => $genres,
            'transactions' => $transactions,
        ]);
    }
}
