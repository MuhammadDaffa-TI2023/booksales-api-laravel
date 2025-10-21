<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   
    public function index()
    {
        $authors = Author::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua author',
            'data' => $authors
        ]);
    }

   
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
