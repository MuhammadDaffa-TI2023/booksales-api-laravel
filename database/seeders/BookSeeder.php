<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['judul' => 'Harry Potter', 'genre' => 'Fantasy', 'author_id' => 1],
            ['judul' => 'A Game of Thrones', 'genre' => 'Fantasy', 'author_id' => 2],
            ['judul' => 'Kafka on the Shore', 'genre' => 'Fiction', 'author_id' => 3],
            ['judul' => 'Laskar Pelangi', 'genre' => 'Drama', 'author_id' => 4],
            ['judul' => 'The Alchemist', 'genre' => 'Philosophy', 'author_id' => 5],
        ]);
    }
}
