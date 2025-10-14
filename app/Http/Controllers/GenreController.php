<?php

namespace App\Http\Controllers;

class GenreController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'nama' => 'Fiksi'],
            ['id' => 2, 'nama' => 'Non-Fiksi'],
            ['id' => 3, 'nama' => 'Romansa'],
            ['id' => 4, 'nama' => 'Horor'],
            ['id' => 5, 'nama' => 'Petualangan'],
        ];

        return view('genre', compact('data'));
    }
}
