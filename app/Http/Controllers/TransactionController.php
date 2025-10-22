<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * 🔹 1. Admin bisa melihat semua transaksi
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->is_admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hanya admin yang dapat melihat semua transaksi'
            ], 403);
        }

        $transactions = Transaction::with(['book', 'customer'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua transaksi',
            'data' => $transactions
        ]);
    }

    /**
     * 🔹 2. Customer membuat transaksi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User belum login'
            ], 401);
        }

        $book = Book::find($request->book_id);

        if ($book->stock < $request->quantity) {
            return response()->json([
                'status' => 'error',
                'message' => 'Stok buku tidak mencukupi'
            ], 400);
        }

        $lastTransaction = Transaction::latest('id')->first();
        $orderNumber = 'ORD-' . str_pad(($lastTransaction ? $lastTransaction->id + 1 : 1), 4, '0', STR_PAD_LEFT);

        $total = $book->price * $request->quantity;
        $book->decrement('stock', $request->quantity);

        $transaction = Transaction::create([
            'order_number' => $orderNumber,
            'customer_id'  => $user->id,
            'book_id'      => $book->id,
            'quantity'     => $request->quantity,
            'total_amount' => $total,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil dibuat',
            'data' => [
                'order_number'  => $transaction->order_number,
                'customer_name' => $user->name,
                'book_title'    => $book->title,
                'quantity'      => $transaction->quantity,
                'total_amount'  => $transaction->total_amount,
            ]
        ]);
    }

    /**
     * 🔹 3. Customer atau Admin bisa melihat detail transaksi
     */
    public function show($id)
    {
        $user = auth()->user();

        // 🔍 Cari transaksi berdasarkan ID + relasi
        $transaction = Transaction::with(['book', 'customer'])->find($id);

        if (!$transaction) {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        // 🔒 Jika bukan admin, pastikan hanya bisa lihat transaksinya sendiri
        if (!$user->is_admin && $transaction->customer_id !== $user->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki izin untuk melihat transaksi ini'
            ], 403);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail transaksi',
            'data' => $transaction
        ]);
    }

    /**
     * 🔹 4. Admin bisa menghapus satu transaksi
     */
    public function destroy($id)
    {
        $user = Auth::user();

        if (!$user || !$user->is_admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Hanya admin yang dapat menghapus transaksi'
            ], 403);
        }

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil dihapus'
        ]);
    }
}
