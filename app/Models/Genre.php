<?php

namespace App\Models;

class Genre
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'Fiction', 'book' => 'To Kill a Mockingbird'],
            ['id' => 2, 'name' => 'Mystery', 'book' => 'Murder on the Orient Express'],
            ['id' => 3, 'name' => 'Science Fiction', 'book' => 'Dune'],
            ['id' => 4, 'name' => 'Fantasy', 'book' => 'Harry Potter and the Sorcerer\'s Stone'],
            ['id' => 5, 'name' => 'Biography', 'book' => 'The Diary of a Young Girl'],
        ];
    }
}
