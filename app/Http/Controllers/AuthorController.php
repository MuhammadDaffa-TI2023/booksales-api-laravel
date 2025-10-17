<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // 🔹 READ all
    public function index()
    {
        $authors = Author::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua author',
            'data' => $authors
        ]);
    }

    // 🔹 CREATE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'photo' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        $author = Author::create($request->only(['name', 'photo', 'bio']));

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil ditambahkan',
            'data' => $author
        ]);
    }

    // 🔹 SHOW
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $author
        ]);
    }

    // 🔹 UPDATE
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'photo' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        $author->update($request->only(['name', 'photo', 'bio']));

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil diperbarui',
            'data' => $author
        ]);
    }

    // 🔹 DESTROY
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil dihapus'
        ]);
    }
}
