<?php

namespace App\Http\Controllers;

use App\Models\Book; // Import model Book
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        $books = Book::all(); // Ambil semua data buku dari database
        return view('books.index', compact('books')); // Kirim data buku ke view
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan formulir untuk menambah buku baru.
     */
    public function create()
    {
        return view('books.create'); // Tampilkan view formulir tambah buku
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data buku baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1000|max:' . date('Y'), // Tahun tidak boleh lebih dari tahun sekarang
            'quantity' => 'required|integer|min:0', // Jumlah tidak boleh negatif
        ]);

        // Buat record buku baru di database
        Book::create($request->all());

        // Redirect kembali ke daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * Menampilkan detail satu buku.
     */
    public function show(Book $book) // Menggunakan Route Model Binding
    {
        return view('books.show', compact('book')); // Tampilkan view detail buku
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan formulir untuk mengedit buku.
     */
    public function edit(Book $book) // Menggunakan Route Model Binding
    {
        return view('books.edit', compact('book')); // Tampilkan view formulir edit buku
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data buku di database.
     */
    public function update(Request $request, Book $book) // Menggunakan Route Model Binding
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'quantity' => 'required|integer|min:0',
        ]);

        // Update record buku
        $book->update($request->all());

        // Redirect kembali ke daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus buku dari database.
     */
    public function destroy(Book $book) // Menggunakan Route Model Binding
    {
        $book->delete(); // Hapus record buku

        // Redirect kembali ke daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}