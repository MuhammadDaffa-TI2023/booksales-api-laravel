<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // 🔹 READ all genre
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua genre',
            'data' => $genres
        ]);
    }

    // 🔹 CREATE genre baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil ditambahkan',
            'data' => $genre
        ]);
    }
}
