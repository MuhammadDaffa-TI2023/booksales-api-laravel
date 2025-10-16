<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel authors.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // nama author
            $table->string('photo')->nullable(); // foto bisa kosong
            $table->text('bio')->nullable(); // deskripsi/bio author
            $table->timestamps();             // created_at dan updated_at
        });
    }

    /**
     * Batalkan migrasi (rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
