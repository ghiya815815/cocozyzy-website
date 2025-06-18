@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-black dark:text-white">Catat Peminjaman Baru</h2>
            <a href="{{ route('borrowings.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-300 py-2 px-4 text-center font-medium text-black hover:bg-opacity-90 dark:bg-gray-700 dark:text-white">
                Kembali ke Daftar Peminjaman
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
            <form action="{{ route('borrowings.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="mb-3 block text-black dark:text-white">Anggota Peminjam <span class="text-danger">*</span></label>
                    <div class="relative z-20 bg-white dark:bg-form-input">
                        <select id="user_id" name="user_id"
                        class="relative w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                        <option value="">Pilih Anggota</option>
                            @foreach ($users as $user)
                                 <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->phone_number }})</option>
                             @endforeach
                        </select>
                        <span class="absolute top-1/2 right-4 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.5C11.5 16.5 11.0833 16.3333 10.75 16L6.75 12C6.41667 11.6667 6.41667 11.0833 6.75 10.75C7.08333 10.4167 7.66667 10.4167 8 10.75L12 14.75L16 10.75C16.3333 10.4167 16.9167 10.4167 17.25 10.75C17.5833 11.0833 17.5833 11.6667 17.25 12L13.25 16C12.9167 16.3333 12.5 16.5 12 16.5Z" fill=""></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="book_id" class="mb-3 block text-black dark:text-white">Buku yang Dipinjam <span class="text-danger">*</span></label>
                    <div class="relative z-20 bg-white dark:bg-form-input">
                        <select id="book_id" name="book_id"
                            class="relative w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                            <option value="">Pilih Buku</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->title }} (Stok: {{ $book->quantity }})</option>
                            @endforeach
                        </select>
                        <span class="absolute top-1/2 right-4 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16.5C11.5 16.5 11.0833 16.3333 10.75 16L6.75 12C6.41667 11.6667 6.41667 11.0833 6.75 10.75C7.08333 10.4167 7.66667 10.4167 8 10.75L12 14.75L16 10.75C16.3333 10.4167 16.9167 10.4167 17.25 10.75C17.5833 11.0833 17.5833 11.6667 17.25 12L13.25 16C12.9167 16.3333 12.5 16.5 12 16.5Z" fill=""></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="borrow_date" class="mb-3 block text-black dark:text-white">Tanggal Peminjaman <span class="text-danger">*</span></label>
                    <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                </div>
                <div class="mb-6">
                    <label for="due_date" class="mb-3 block text-black dark:text-white">Tanggal Jatuh Tempo <span class="text-danger">*</span></label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+7 days'))) }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                </div>

                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-primary py-3 px-6 text-center font-medium text-white hover:bg-opacity-90">
                    Catat Peminjaman
                </button>
            </form>
        </div>
    </div>
</main>
@endsection