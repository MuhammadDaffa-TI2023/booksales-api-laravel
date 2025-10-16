<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        // Ambil data author beserta buku yang ditulisnya
        $authors = Author::with('books')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua author',
            'data' => $authors
        ]);
    }
}
