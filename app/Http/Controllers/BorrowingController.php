<?php

namespace App\Http\Controllers;

use App\Models\Borrowing; // Import model Borrowing
use App\Models\Book;      // Import model Book
use App\Models\User;      // Import model User (untuk anggota)
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua peminjaman.
     */
    public function index()
    {
        // Ambil semua data peminjaman, dengan eager loading relasi book dan user
        $borrowings = Borrowing::with(['book', 'user'])->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan formulir untuk menambah peminjaman baru.
     */
    public function create()
    {
        // Ambil semua buku yang tersedia (quantity > 0)
        $books = Book::where('quantity', '>', 0)->get();
        // Ambil semua user (anggota)
        $users = User::all(); // Sesuaikan jika Anda punya model 'Member' terpisah

        return view('borrowings.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data peminjaman baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'user_id' => 'required|exists:users,id', // Harus ada di tabel users
            'book_id' => 'required|exists:books,id', // Harus ada di tabel books
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date', // Jatuh tempo tidak boleh sebelum tanggal pinjam
        ]);

        $book = Book::find($request->book_id);

        // Pastikan buku tersedia (quantity > 0) sebelum meminjam
        if ($book->quantity <= 0) {
            return redirect()->back()->withErrors(['book_id' => 'Buku tidak tersedia untuk dipinjam.'])->withInput();
        }

        // Kurangi stok buku
        $book->quantity--;
        $book->save();

        // Buat record peminjaman baru
        Borrowing::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'due_date' => $request->due_date,
            // 'returned_at' akan null saat peminjaman baru
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman buku berhasil dicatat!');
    }

    // Metode show, edit, update, destroy untuk peminjaman (jika diperlukan di masa depan)

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $users = User::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date',
            'returned_at' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        // Logika untuk mengembalikan stok jika buku diubah/dihapus dari peminjaman
        // Ini bisa menjadi lebih kompleks jika Anda ingin melacak riwayat
        $old_book_id = $borrowing->book_id;
        $borrowing->update($request->all());

        // Jika buku diubah atau status pengembalian diubah
        if ($old_book_id != $request->book_id || ($borrowing->returned_at && !$borrowing->getOriginal('returned_at'))) {
             // Tambah stok buku lama jika ada dan belum dikembalikan sebelumnya
            $oldBook = Book::find($old_book_id);
            if ($oldBook && !$borrowing->getOriginal('returned_at')) { // Pastikan hanya menambah stok jika sebelumnya belum dikembalikan
                $oldBook->quantity++;
                $oldBook->save();
            }

            // Kurangi stok buku baru jika ada perubahan buku dan belum dikembalikan
            $newBook = Book::find($request->book_id);
            if ($newBook && !$borrowing->returned_at) { // Kurangi jika belum dikembalikan
                $newBook->quantity--;
                $newBook->save();
            }
        } else if ($borrowing->returned_at && !$borrowing->getOriginal('returned_at')) {
            // Jika status changed from not returned to returned
            $book = Book::find($borrowing->book_id);
            $book->quantity++;
            $book->save();
        } else if (!$borrowing->returned_at && $borrowing->getOriginal('returned_at')) {
            // If status changed from returned to not returned (undo return)
            $book = Book::find($borrowing->book_id);
            $book->quantity--;
            $book->save();
        }


        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * Hapus record peminjaman.
     */
    public function destroy(Borrowing $borrowing)
    {
        // Tambah kembali stok buku jika peminjaman yang dihapus belum dikembalikan
        if (is_null($borrowing->returned_at)) {
            $book = Book::find($borrowing->book_id);
            if ($book) {
                $book->quantity++;
                $book->save();
            }
        }
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus!');
    }

    /**
     * Handle book return.
     * Metode kustom untuk menandai buku telah dikembalikan.
     */
    public function returnBook(Borrowing $borrowing)
    {
        if (is_null($borrowing->returned_at)) {
            $borrowing->update(['returned_at' => now()]); // Set tanggal kembali menjadi sekarang

            // Tambah stok buku
            $book = Book::find($borrowing->book_id);
            if ($book) {
                $book->quantity++;
                $book->save();
            }
            return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan!');
        }
        return redirect()->back()->with('info', 'Buku ini sudah dikembalikan.');
    }
}