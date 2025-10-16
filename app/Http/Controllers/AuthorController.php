<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // 🔹 READ: ambil semua data author
    public function index()
    {
        $authors = Author::with('books')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua author',
            'data' => $authors
        ]);
    }

    // 🔹 CREATE: tambah author baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'negara' => 'nullable|string|max:100',
        ]);

        $author = Author::create([
            'nama' => $request->nama,
            'negara' => $request->negara,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil ditambahkan',
            'data' => $author
        ]);
    }
}
