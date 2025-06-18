@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Manajemen Buku</h2>
            <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-4 text-center font-medium text-white hover:bg-opacity-90">
                <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9997 7.33333H8.66634V0.999997C8.66634 0.541664 8.29134 0.166664 7.83301 0.166664C7.37467 0.166664 7.00001 0.541664 7.00001 0.999997V7.33333H0.666675C0.208341 7.33333 -0.166659 7.70833 -0.166659 8.16666C-0.166659 8.625 0.208341 8.99999 0.666675 8.99999H7.00001V15.3333C7.00001 15.7917 7.37467 16.1667 7.83301 16.1667C8.29134 16.1667 8.66634 15.7917 8.66634 15.3333V8.99999H14.9997C15.458 8.99999 15.833 8.625 15.833 8.16666C15.833 7.70833 15.458 7.33333 14.9997 7.33333Z" fill="white"/>
                </svg>
                Tambah Buku Baru
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif

        <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <h3 class="text-xl font-semibold text-black dark:text-white mb-4">Daftar Buku</h3>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-meta-4 text-left">
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Judul</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Penulis</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Penerbit</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Tahun Terbit</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">ISBN</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Stok</th>
                            <th class="px-4 py-2 font-medium text-black dark:text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->title }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->author }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->publisher ?? '-' }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->publication_year ?? '-' }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->isbn ?? '-' }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $book->quantity }}</td>
                                <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <a href="{{ route('books.show', $book->id) }}" class="hover:text-primary" title="Lihat Detail">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 4.5C7.521 4.5 3.733 7.02 2 12C3.733 16.98 7.521 19.5 12 19.5C16.479 19.5 20.267 16.98 22 12C20.267 7.02 16.479 4.5 12 4.5ZM12 17.5C9.037 17.5 6.5 15.037 6.5 12C6.5 8.963 9.037 6.5 12 6.5C14.963 6.5 17.5 8.963 17.5 12C17.5 15.037 14.963 17.5 12 17.5ZM12 14.5C13.381 14.5 14.5 13.381 14.5 12C14.5 10.619 13.381 9.5 12 9.5C10.619 9.5 9.5 10.619 9.5 12C9.5 13.381 10.619 14.5 12 14.5Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="hover:text-success" title="Edit">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.875 4.875L19.125 7.125M17.625 3.375L7.125 13.875C6.75 14.25 6.375 15.125 6.375 15.625V17.625H8.375C8.875 17.625 9.75 17.25 10.125 16.875L20.625 6.375C21.375 5.625 21.375 4.375 20.625 3.625L18.375 1.375C17.625 0.625 16.375 0.625 15.625 1.375L3.625 13.375C2.875 14.125 2.875 15.375 3.625 16.125L4.125 16.625L1.625 19.125C0.875 19.875 0.875 21.125 1.625 21.875C2.375 22.625 3.625 22.625 4.375 21.875L6.875 19.375L7.375 19.875C8.125 20.625 9.375 20.625 10.125 19.875L22.125 7.875C22.875 7.125 22.875 5.875 22.125 5.125L20.625 3.625Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hover:text-danger" title="Hapus">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19 7L18.465 19.043C18.402 20.302 17.382 21.25 16.126 21.25H7.874C6.618 21.25 5.598 20.302 5.535 19.043L5 7M21 7H3M10 11.5V17.5M14 11.5V17.5M8 7V5.5C8 4.67157 8.67157 4 9.5 4H14.5C15.3284 4 16 4.67157 16 5.5V7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">Belum ada buku yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection