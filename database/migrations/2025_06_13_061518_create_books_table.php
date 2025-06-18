<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul buku
            $table->string('author'); // Penulis
            $table->text('description')->nullable(); // Deskripsi buku, bisa kosong
            $table->string('publisher')->nullable(); // Penerbit, bisa kosong
            $table->integer('publication_year')->nullable(); // Tahun terbit
            $table->integer('quantity'); // Jumlah stok buku
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};