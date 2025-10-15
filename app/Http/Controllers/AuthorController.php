<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('author', ['data' => $authors, 'title' => '👤 Daftar Author']);
    }
}
