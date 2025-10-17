<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // 🔹 READ: Ambil semua data author
    public function index()
    {
        $authors = Author::with('books')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua author',
            'data' => $authors
        ]);
    }

    // 🔹 CREATE: Tambah author baru
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'photo' => 'nullable|string|max:255',
        'bio' => 'nullable|string',
    ]);

    $author = new Author();
    $author->name = $request->name;
    $author->photo = $request->photo;
    $author->bio = $request->bio;
    $author->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Author berhasil ditambahkan',
        'data' => $author
    ]);
}

}
