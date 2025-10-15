<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['nama' => 'J.K. Rowling', 'negara' => 'Inggris'],
            ['nama' => 'George R.R. Martin', 'negara' => 'AS'],
            ['nama' => 'Haruki Murakami', 'negara' => 'Jepang'],
            ['nama' => 'Andrea Hirata', 'negara' => 'Indonesia'],
            ['nama' => 'Paulo Coelho', 'negara' => 'Brasil'],
        ]);
    }
}
