@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Tambah Buku Baru</h2>
            <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-300 py-2 px-4 text-center font-medium text-black hover:bg-opacity-90 dark:bg-gray-700 dark:text-white">
                Kembali ke Daftar Buku
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Ada masalah:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif

        <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="mb-3 block text-black dark:text-white">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan judul buku"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="mb-3 block text-black dark:text-white">Penulis <span class="text-danger">*</span></label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Masukkan nama penulis"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="mb-3 block text-black dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" placeholder="Masukkan deskripsi buku"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">{{ old('description') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="publisher" class="mb-3 block text-black dark:text-white">Penerbit</label>
                    <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" placeholder="Masukkan nama penerbit"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div class="mb-4">
                    <label for="publication_year" class="mb-3 block text-black dark:text-white">Tahun Terbit</label>
                    <input type="number" id="publication_year" name="publication_year" value="{{ old('publication_year') }}" placeholder="Contoh: 2023"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div class="mb-6">
                    <label for="quantity" class="mb-3 block text-black dark:text-white">Jumlah Stok <span class="text-danger">*</span></label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" placeholder="Masukkan jumlah stok buku"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required min="0">
                </div>

                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-6 text-center font-medium text-white hover:bg-opacity-90">
                    Simpan Buku
                </button>
            </form>
        </div>
    </div>
</main>
@endsection