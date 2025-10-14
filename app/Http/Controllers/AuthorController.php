<?php

namespace App\Http\Controllers;

class AuthorController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'nama' => 'Tere Liye'],
            ['id' => 2, 'nama' => 'Andrea Hirata'],
            ['id' => 3, 'nama' => 'Dewi Lestari'],
            ['id' => 4, 'nama' => 'Raditya Dika'],
            ['id' => 5, 'nama' => 'Ahmad Fuadi'],
        ];

        return view('author', compact('data'));
    }
}
