<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 🔹 Menampilkan semua buku beserta relasinya (author & genre)
     */
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua buku',
            'data' => $books
        ]);
    }

    /**
     * 🔹 Menampilkan detail satu buku
     */
    public function show($id)
    {
        $book = Book::with(['author', 'genre'])->find($id);

        if (! $book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail buku',
            'data' => $book
        ]);
    }

    /**
     * 🔹 Menyimpan buku baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
            'cover_photo' => 'nullable|string',
        ]);

        $book = Book::create([
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'genre_id'    => $request->genre_id,
            'author_id'   => $request->author_id,
            'cover_photo' => $request->cover_photo ?? null,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    /**
     * 🔹 Mengupdate data buku berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (! $book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer|min:0',
            'genre_id' => 'sometimes|exists:genres,id',
            'author_id' => 'sometimes|exists:authors,id',
            'cover_photo' => 'nullable|string',
        ]);

        $book->update($request->only([
            'title',
            'description',
            'price',
            'stock',
            'genre_id',
            'author_id',
            'cover_photo'
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Buku berhasil diperbarui',
            'data' => $book
        ]);
    }

    
    public function destroy($id)
    {
        $book = Book::find($id);

        if (! $book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

       
        if ($book->cover_photo && file_exists(storage_path('app/public/' . $book->cover_photo))) {
            unlink(storage_path('app/public/' . $book->cover_photo));
        }

        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Buku berhasil dihapus'
        ]);
    }
}
