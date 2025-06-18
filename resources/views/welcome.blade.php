@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
            <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <svg class="fill-primary dark:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.68629 2 6 4.68629 6 8V20C6 21.1046 6.89543 22 8 22H16C17.1046 22 18 21.1046 18 20V8C18 4.68629 15.3137 2 12 2ZM8 8C8 5.79086 9.79086 4 12 4C14.2091 4 16 5.79086 16 8V20H8V8Z" fill="currentColor"/>
                        <rect x="8" y="10" width="8" height="2" rx="1" fill="currentColor"/>
                        <rect x="8" y="14" width="8" height="2" rx="1" fill="currentColor"/>
                        <rect x="8" y="18" width="4" height="2" rx="1" fill="currentColor"/>
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalBooks }}
                        </h4>
                        <span class="text-sm font-medium">Total Buku</span>
                    </div>
                </div>
            </div>
            <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <svg class="fill-primary dark:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 13H18.5C19.3284 13 20 13.6716 20 14.5V19.5C20 20.3284 19.3284 21 18.5 21H5.5C4.67157 21 4 20.3284 4 19.5V14.5C4 13.6716 4.67157 13 5.5 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 13V7.5C8 5.01472 9.79086 3 12 3C14.2091 3 16 5.01472 16 7.5V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $borrowedBooks }}
                        </h4>
                        <span class="text-sm font-medium">Buku Dipinjam</span>
                    </div>
                </div>
            </div>
            <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <svg class="fill-primary dark:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 21L15.6593 15.6593M15.6593 15.6593C16.6022 14.7164 17.1818 13.4359 17.1818 12.0001C17.1818 10.5643 16.6022 9.28384 15.6593 8.34096C14.7164 7.39808 13.4359 6.81846 12.0001 6.81846C10.5643 6.81846 9.28384 7.39808 8.34096 8.34096C7.39808 9.28384 6.81846 10.5643 6.81846 12.0001C6.81846 13.4359 7.39808 14.7164 8.34096 15.6593C9.28384 16.6022 10.5643 17.1818 12.0001 17.1818C13.4359 17.1818 14.7164 16.6022 15.6593 15.6593Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 3H12V12H3V3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $availableBooks }}
                        </h4>
                        <span class="text-sm font-medium">Buku Tersedia</span>
                    </div>
                </div>
            </div>
            <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <svg class="fill-primary dark:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18 20V19C18 16.7909 16.2091 15 14 15H10C7.79086 15 6 16.7909 6 19V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalMembers }}
                        </h4>
                        <span class="text-sm font-medium">Total Anggota</span>
                    </div>
                </div>
            </div>
            </div>

        <div class="mt-8 grid grid-cols-1 gap-4 md:gap-6">
            <div class="rounded-sm border border-stroke bg-white p-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <h3 class="text-xl font-semibold text-black dark:text-white mb-4">Peminjaman Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-meta-4 text-left">
                                <th class="px-4 py-2 font-medium text-black dark:text-white">Judul Buku</th>
                                <th class="px-4 py-2 font-medium text-black dark:text-white">Peminjam</th>
                                <th class="px-4 py-2 font-medium text-black dark:text-white">Tanggal Pinjam</th>
                                <th class="px-4 py-2 font-medium text-black dark:text-white">Tanggal Kembali</th>
                                <th class="px-4 py-2 font-medium text-black dark:text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestBorrowings as $borrowing)
                                <tr>
                                    <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $borrowing['title'] }}</td>
                                    <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $borrowing['borrower'] }}</td>
                                    <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $borrowing['borrow_date'] }}</td>
                                    <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">{{ $borrowing['return_date'] }}</td>
                                    <td class="border-b border-[#eee] py-4 px-4 dark:border-strokedark">
                                        <span class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium {{ $borrowing['is_overdue'] ? 'bg-danger text-danger' : 'bg-success text-success' }}">
                                            {{ $borrowing['is_overdue'] ? 'Terlambat' : 'Dipinjam' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($latestBorrowings) == 0)
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data peminjaman terbaru.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection