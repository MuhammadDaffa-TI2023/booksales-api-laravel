<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // ubah kolom judul -> title
            $table->renameColumn('judul', 'title');

            // hapus kolom genre lama
            $table->dropColumn('genre');

            // tambahkan kolom baru
            $table->text('description')->nullable()->after('title');
            $table->decimal('price', 10, 2)->nullable()->after('description');
            $table->integer('stock')->default(0)->after('price');
            $table->string('cover_photo')->nullable()->after('stock');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // rollback
            $table->renameColumn('title', 'judul');
            $table->string('genre')->nullable();
            $table->dropColumn(['description', 'price', 'stock', 'cover_photo']);
        });
    }
};
