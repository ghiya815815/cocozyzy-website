<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'author',
        'description',
        'publisher',
        'publication_year',
        'quantity',
    ];

    // Relasi: Satu buku bisa dipinjam berkali-kali (punya banyak borrowing records)
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}