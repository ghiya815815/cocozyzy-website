<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'due_date',
        'returned_at',
    ];

    // Relasi: Satu peminjaman hanya untuk satu buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi: Satu peminjaman hanya dilakukan oleh satu user (anggota)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}