@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Detail Buku: {{ $book->title }}</h2>
            <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-300 py-2 px-4 text-center font-medium text-black hover:bg-opacity-90 dark:bg-gray-700 dark:text-white">
                Kembali ke Daftar Buku
            </a>
        </div>

        <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex flex-col gap-5.5 p-6.5">
                <div>
                    <h4 class="font-medium text-black dark:text-white">Judul:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->title }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">Penulis:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->author }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">Deskripsi:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->description ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">Penerbit:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->publisher ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">Tahun Terbit:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->publication_year ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">ISBN:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->isbn ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="font-medium text-black dark:text-white">Jumlah Stok:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $book->quantity }}</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection