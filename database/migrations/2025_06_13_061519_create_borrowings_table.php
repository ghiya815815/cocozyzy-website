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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // FK ke tabel users (anggota)
            $table->foreignId('book_id')->constrained('books'); // FK ke tabel books
            $table->date('borrow_date'); // Tanggal pinjam
            $table->date('due_date');    // Tanggal jatuh tempo pengembalian
            $table->date('returned_at')->nullable(); // Tanggal pengembalian (akan diisi jika sudah kembali)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};