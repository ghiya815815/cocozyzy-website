<aside
    :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false"
>
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-center gap-2 px-3 py-5.5 lg:py-6.5">
        <div class="flex items-center justify-center gap-2 px-3 py-5.5 lg:py-6.5">
    <a href="{{ route('landing') }}" class="text-4xl font-bold text-white drop-shadow-md -mt-2"> CozyLibrary
    </a>
</div>
    

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill=""
                />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
    <li>
        <a href="{{ route('dashboard') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ Request::routeIs('dashboard') ? 'bg-graydark dark:bg-meta-4' : '' }}">
            <svg class="fill-current shrink-0" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5 8.16667V1.5C16.5 1.08333 16.1667 0.75 15.75 0.75H12.75C12.3333 0.75 12 1.08333 12 1.5V6H6V1.5C6 1.08333 5.66667 0.75 5.25 0.75H2.25C1.83333 0.75 1.5 1.08333 1.5 1.5V8.16667C1.5 8.41667 1.625 8.625 1.75 8.75L8.75 16.25C9.04167 16.5417 9.58333 16.5417 9.875 16.25L16.75 8.75C16.875 8.625 17 8.41667 17 8.16667H16.5ZM10.5 15.5L4.5 9V3H7.5V7.5C7.5 7.91667 7.83333 8.25 8.25 8.25H9.25C9.66667 8.25 10 7.91667 10 7.5V3H13V9L10.5 15.5Z" fill=""></path>
            </svg>
            Dashboard
        </a>
    </li>

    <li>
        <span class="text-xs font-semibold text-gray-500 uppercase px-4 pt-4 mb-2">Master Data</span>
    </li>
    
    <li>
        <a href="{{ route('books.index') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ Request::routeIs('books.*') ? 'bg-graydark dark:bg-meta-4' : '' }}">
            <svg class="fill-current shrink-0" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C8.68629 2 6 4.68629 6 8V20C6 21.1046 6.89543 22 8 22H16C17.1046 22 18 21.1046 18 20V8C18 4.68629 15.3137 2 12 2ZM8 8C8 5.79086 9.79086 4 12 4C14.2091 4 16 5.79086 16 8V20H8V8Z" fill="currentColor"/>
                <rect x="8" y="10" width="8" height="2" rx="1" fill="currentColor"/>
                <rect x="8" y="14" width="8" height="2" rx="1" fill="currentColor"/>
                <rect x="8" y="18" width="4" height="2" rx="1" fill="currentColor"/>
            </svg>
            Manajemen Buku
        </a>
    </li>
    <li>
        <a href="{{ route('borrowings.index') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4 {{ Request::routeIs('borrowings.*') ? 'bg-graydark dark:bg-meta-4' : '' }}">
            <svg class="fill-current shrink-0" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.486 2 2 6.486 2 12C2 17.514 6.486 22 12 22C17.514 22 22 17.514 22 12C22 6.486 17.514 2 12 2ZM12 20C7.589 20 4 16.411 4 12C4 7.589 7.589 4 12 4C16.411 4 20 7.589 20 12C20 16.411 16.411 20 12 20Z" fill="currentColor"/>
                <path d="M12 7C11.4477 7 11 7.44772 11 8V12C11 12.5523 11.4477 13 12 13H15C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11H12V8C12 7.44772 11.5523 7 11 7Z" fill="currentColor"/>
            </svg>
            Peminjaman Buku
        </a>
    </li>

    {{-- Contoh jika ingin mempertahankan Genre Data sebagai Kategori Buku --}}
    {{-- <li>
        <a href="#" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
            <svg>...</svg>
            Kategori Buku
        </a>
    </li> --}}
</ul>
            </div>

            
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>

<!-- ===== Sidebar End ===== -->
