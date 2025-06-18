@extends('_layouts.main') 

@section('content')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black">
                REVIEW | data table
            </h2>

            <nav>
                <a href="/reviews/create"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Create
                </a>
            </nav>
        </div>

        @if (session('success'))
            <div
                class="flex w-full border-l-6 border-[#34D399] bg-[#34D399] bg-opacity-[15%] my-4 px-7 py-6 shadow-md">
                <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#34D399]">
                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                            fill="white" stroke="white"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <h5 class="text-lg font-bold text-black">
                        {{ session('success') }}
                    </h5>
                </div>
            </div>
        @endif
        <!-- Breadcrumb End -->

        <!-- ====== Table Section Start -->
        <div class="flex flex-col gap-10">
            <!-- ====== Table Two Start -->
            <div class="rounded-sm border border-stroke bg-white shadow-default">
                <div
                    class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 sm:grid-cols-8 md:px-6 2xl:px-7.5">

                    <div class="col-span-2 flex items-center ">
                        <p class="font-medium">Movie</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">User</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">Rate</p>
                    </div>
                    <div class="col-span-2 flex items-center">
                        <p class="font-medium">Date</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">Actions</p>
                    </div>
                </div>
                @foreach ($reviews as $review)
                    <div
                        class="grid grid-cols-6 border-t border-stroke px-4 py-4.5 sm:grid-cols-8 md:px-6 2xl:px-7.5">
                        <div class="col-span-2  flex items-center">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                                <div class="w-12 rounded-md">
                                    <img src="src/images/reviews/{{ $review->poster }}" alt="Product" />
                                </div>
                                <p class="text-sm font-medium text-black">
                                    {{ $review->movie->title }}
                                </p>
                            </div>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black">
                                {{  $review->user }}
                            </p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <p class="text-sm font-medium text-black">
                                {{  $review->rate }}
                            </p>
                        </div>
                        <div class="col-span-2  flex items-center">
                            <p class="text-sm font-medium text-black">
                                {{  $review->date }}
                            </p>
                        </div>
                        <div class="col-span-1 flex items-center">
                            <div class="flex items-center space-x-1">
                                <a href="/reviews/{{ $review->id }}/edit"
                                    class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Edit</a>
                                <form action="/reviews/{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-800 ring-1 ring-inset ring-red-600/20"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- ====== Table Two End -->
        </div>
        <!-- ====== Table Section End -->
    </div>
</main>
@endsection