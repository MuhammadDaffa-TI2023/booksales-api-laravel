<?php

namespace App\Models;

class Author
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling', 'book' => 'Harry Potter and the Chamber of Secrets'],
            ['id' => 2, 'name' => 'George R.R. Martin', 'book' => 'A Game of Thrones'],
            ['id' => 3, 'name' => 'Agatha Christie', 'book' => 'Murder on the Orient Express'],
            ['id' => 4, 'name' => 'J.R.R. Tolkien', 'book' => 'The Hobbit'],
            ['id' => 5, 'name' => 'Stephen King', 'book' => 'The Shining'],
        ];
    }
}
