<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // 🔹 READ all
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua genre',
            'data' => $genres
        ]);
    }

    // 🔹 CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        $genre = Genre::create($request->only(['nama', 'deskripsi']));

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil ditambahkan',
            'data' => $genre
        ]);
    }

    // 🔹 SHOW (Detail by ID)
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $genre
        ]);
    }

    // 🔹 UPDATE
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'sometimes|required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        $genre->update($request->only(['nama', 'deskripsi']));

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil diperbarui',
            'data' => $genre
        ]);
    }

    // 🔹 DESTROY
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil dihapus'
        ]);
    }
}
