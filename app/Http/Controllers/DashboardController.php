<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy untuk dashboard
        $totalBooks = 1250; // Total buku di perpustakaan
        $borrowedBooks = 345; // Total buku yang sedang dipinjam
        $availableBooks = $totalBooks - $borrowedBooks; // Buku yang tersedia
        $totalMembers = 876; // Total anggota perpustakaan
        $overdueBooks = 25; // Buku yang telat dikembalikan
        $newArrivals = 15; // Buku baru bulan ini

        // Contoh data peminjaman terbaru (bisa diganti dengan query database)
        $latestBorrowings = [
            [
                'title' => 'Filosofi Teras',
                'borrower' => 'Andi Santoso',
                'borrow_date' => '2024-05-20',
                'return_date' => '2024-06-03',
                'status' => 'Dipinjam',
                'is_overdue' => false,
            ],
            [
                'title' => 'Atomic Habits',
                'borrower' => 'Budi Cahyadi',
                'borrow_date' => '2024-05-10',
                'return_date' => '2024-05-24', // Tanggal kembali sudah lewat
                'status' => 'Dipinjam',
                'is_overdue' => true,
            ],
            [
                'title' => 'Laut Bercerita',
                'borrower' => 'Citra Dewi',
                'borrow_date' => '2024-06-01',
                'return_date' => '2024-06-15',
                'status' => 'Dipinjam',
                'is_overdue' => false,
            ],
            [
                'title' => 'Sapiens: A Brief History of Humankind',
                'borrower' => 'Dewi Lestari',
                'borrow_date' => '2024-05-25',
                'return_date' => '2024-06-08',
                'status' => 'Dipinjam',
                'is_overdue' => false,
            ],
        ];

        // Pastikan ini me-return view 'welcome', bukan 'dashboard.index'
        return view('welcome', compact(
            'totalBooks',
            'borrowedBooks',
            'availableBooks',
            'totalMembers',
            'overdueBooks',
            'newArrivals',
            'latestBorrowings'
        ));
    }
}