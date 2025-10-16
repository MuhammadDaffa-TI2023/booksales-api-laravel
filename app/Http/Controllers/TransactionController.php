<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // 🔹 READ: ambil semua transaksi
    public function index()
    {
        $transactions = Transaction::with(['book', 'customer'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar semua transaksi',
            'data' => $transactions
        ]);
    }

    // 🔹 CREATE: tambah transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string|max:255',
            'customer_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $transaction = Transaction::create([
            'order_number' => $request->order_number,
            'customer_id' => $request->customer_id,
            'book_id' => $request->book_id,
            'total_amount' => $request->total_amount,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil ditambahkan',
            'data' => $transaction
        ]);
    }
}
