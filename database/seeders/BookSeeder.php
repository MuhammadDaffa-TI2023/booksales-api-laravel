<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Hujan', 'description' => 'Kisah romansa dan bencana yang menyentuh hati.', 'price' => 89000, 'stock' => 50, 'cover_photo' => 'hujan.jpg', 'genre_id' => 1, 'author_id' => 1],
            ['title' => 'Laskar Pelangi', 'description' => 'Perjalanan hidup anak-anak Belitong yang penuh semangat.', 'price' => 99000, 'stock' => 40, 'cover_photo' => 'laskar_pelangi.jpg', 'genre_id' => 2, 'author_id' => 2],
            ['title' => 'Supernova', 'description' => 'Cerita fiksi ilmiah dan spiritual yang memukau.', 'price' => 120000, 'stock' => 35, 'cover_photo' => 'supernova.jpg', 'genre_id' => 4, 'author_id' => 3],
            ['title' => 'Ayat-Ayat Cinta', 'description' => 'Kisah cinta Islami yang menggugah hati.', 'price' => 95000, 'stock' => 45, 'cover_photo' => 'ayat_ayat_cinta.jpg', 'genre_id' => 3, 'author_id' => 4],
            ['title' => 'Lelaki Harimau', 'description' => 'Novel realisme magis karya sastrawan Indonesia.', 'price' => 110000, 'stock' => 30, 'cover_photo' => 'lelaki_harimau.jpg', 'genre_id' => 5, 'author_id' => 5],
        ]);
    }
}
