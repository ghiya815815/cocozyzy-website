@extends('_layouts.main')

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black">
                Form Data
            </h2>
        </div>
        <!-- Breadcrumb End -->

        @if ($errors->any())
            <div
                class="flex w-full border-l-6 border-[#F87171] bg-[#F87171] bg-opacity-[15%] my-4 px-7 py-6 shadow-md">
                <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
                            fill="#ffffff" stroke="#ffffff"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <h5 class="mb-3 font-bold text-[#B45454]">
                        Something has gone wrong!
                    </h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="leading-relaxed text-[#CD5D5D]">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- ====== Form Layout Section Start -->
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="flex flex-col">
                <!-- Contact Form -->
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default">
                    <div class="border-b border-stroke px-6.5 py-4">
                        <h3 class="font-medium text-black">
                            Review Form
                        </h3>
                    </div>
                    <form enctype="multipart/form-data" action="/reviews" method="POST">
                        @csrf
                        <div class="p-6.5">

                            <div class="mb-4.5">
                                <label class="mb-3 block text-sm font-medium text-black"> Name Anime <span
                                        class="text-meta-1">*</span> </label>
                                <div x-data="{ isOptionSelected: false }"
                                    class="relative z-20 bg-transparent">
                                    <select id="movie_id" name="movie_id"
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary"
                                        :class="isOptionSelected && 'text-black'"
                                        @change="isOptionSelected = true">
                                        <option value="" class="text-body">
                                            Type your movie
                                        </option>
                                        @foreach ($movies as $movie)
                                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                    fill=""></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-3 block text-sm font-medium text-black"> Poster <span
                                        class="text-meta-1">*</span></label>
                                <input id="poster" name="poster" type="file" placeholder="Enter poster link"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" />
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-3 block text-sm font-medium text-black"> User <span
                                        class="text-meta-1">*</span> </label>
                                <input id="user" name="user" type="text" placeholder="Enter the user"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" />
                            </div>

                            <div class="mb-4.5">
                                <label class="mb-3 block text-sm font-medium text-black"> Rate <span
                                        class="text-meta-1">*</span> </label>
                                <input id="rate" name="rate" type="text" placeholder="Enter rating the anime"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter" />
                            </div>

                            <div class="mb-6">
                                <label class="mb-3 block text-sm font-medium text-black"> Date <span
                                        class="text-meta-1">*</span> </label>
                                <textarea id="date" name="date" type="text" placeholder="Type date now"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"></textarea>
                            </div>

                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                                Save Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ====== Form Layout Section End -->
    </div>
</main>
@endsection