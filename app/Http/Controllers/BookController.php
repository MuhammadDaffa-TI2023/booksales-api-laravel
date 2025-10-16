<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // Ambil data buku beserta nama author-nya
        $books = Book::with('author')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua buku',
            'data' => $books
        ]);
    }
}
