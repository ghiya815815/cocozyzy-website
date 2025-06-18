<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CozyLibrary - Perpustakaan Digital Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* Biru-Ungu */
        }

        /* --- Glassmorphism Effect --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.15); /* Slightly more opaque background */
            backdrop-filter: blur(15px) saturate(180%); /* Blur dan saturasi */
            -webkit-backdrop-filter: blur(15px) saturate(180%); /* Untuk kompatibilitas Safari */
            border: 1px solid rgba(255, 255, 255, 0.2); /* Border yang sedikit lebih terlihat */
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); /* Bayangan yang lebih kuat */
            border-radius: 12px; /* Sudut membulat */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.5);
        }
        /* --------------------------- */

        .cta-button {
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        /* Basic CSS for animations */
        @keyframes fadeInFromUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }
        @keyframes blob1 {
            0%, 100% { transform: translate(0, 0); }
            33% { transform: translate(30px, -20px) scale(1.1); }
            66% { transform: translate(-20px, 40px) scale(0.9); }
        }
        @keyframes blob2 {
            0%, 100% { transform: translate(0, 0); }
            33% { transform: translate(-25px, 20px) scale(0.9); }
            66% { transform: translate(30px, -30px) scale(1.2); }
        }

        .animate-fade-in-up { animation: fadeInFromUp 0.8s ease-out forwards; }
        .animate-fade-in { animation: fadeIn 1s ease-out forwards; }
        .animate-bounce-in { animation: bounceIn 0.8s ease-out forwards; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }

        .animate-blob-1 { animation: blob1 15s infinite alternate; }
        .animate-blob-2 { animation: blob2 18s infinite alternate; }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 antialiased">

    <header class="absolute top-0 left-0 right-0 z-10 p-4 md:p-6">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="{{ route('landing') }}" class="text-2xl font-bold text-white drop-shadow-md">CozyLibrary</a>
            <div class="space-x-4">
                @auth {{-- Jika pengguna sudah login --}}
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-blue-300 transition duration-200">Dashboard</a>
                @else {{-- Jika pengguna belum login --}}
                    <a href="{{ route('login') }}" class="text-white hover:text-blue-300 transition duration-200">Login</a>
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 py-2 px-4 rounded-full text-sm font-semibold hover:bg-gray-100 transition duration-200">Daftar</a>
                @endauth
            </div>
        </nav>
    </header>

    <section class="gradient-hero-bg min-h-screen flex items-center justify-center text-center p-4 md:p-8 relative overflow-hidden">
        <div class="relative z-10 max-w-4xl mx-auto glass-card p-8 md:p-12 rounded-2xl shadow-2xl transition-all duration-300 hover:scale-[1.01]">
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 drop-shadow-xl animate-fade-in-up">
                Kelola Koleksi Buku Anda dengan Mudah
            </h1>
            <p class="text-lg md:text-2xl text-gray-200 mb-10 max-w-2xl mx-auto opacity-0 animate-fade-in delay-200">
                CozyLibrary adalah platform intuitif untuk mengelola perpustakaan digital pribadi Anda. Catat peminjaman, pantau ketersediaan, dan jelajahi ribuan judul.
            </p>
            <a href="{{ route('dashboard') }}" class="cta-button inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full text-xl shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-75 animate-bounce-in delay-400">
                Mulai Sekarang
            </a>
        </div>
        <div class="absolute inset-0 z-0">
            <div class="absolute w-64 h-64 bg-blue-400 opacity-20 rounded-full blur-3xl top-1/4 left-1/4 animate-blob-1"></div>
            <div class="absolute w-96 h-96 bg-purple-400 opacity-20 rounded-full blur-3xl bottom-1/3 right-1/4 animate-blob-2 delay-500"></div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-gray-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-12 text-white">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-6 rounded-lg shadow-xl hover:shadow-2xl text-left">
                    <div class="text-blue-400 mb-4 text-4xl">📚</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Manajemen Buku Lengkap</h3>
                    <p class="text-gray-300">Catat detail buku, penulis, penerbit, ISBN, dan kelola stok dengan mudah.</p>
                </div>
                <div class="glass-card p-6 rounded-lg shadow-xl hover:shadow-2xl text-left">
                    <div class="text-purple-400 mb-4 text-4xl">✍️</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Pencatatan Peminjaman & Pengembalian</h3>
                    <p class="text-gray-300">Lacak siapa meminjam apa, kapan harus kembali, dan catat status pengembalian.</p>
                </div>
                <div class="glass-card p-6 rounded-lg shadow-xl hover:shadow-2xl text-2xl">
                    <div class="text-green-400 mb-4 text-4xl">📊</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Dashboard Informatif</h3>
                    <p class="text-gray-300">Lihat ringkasan statistik perpustakaan Anda secara real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-gray-900 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">Siap Mengatur Perpustakaan Anda?</h2>
            <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                Bergabunglah dengan CozyLibrary sekarang dan nikmati kemudahan mengelola koleksi buku Anda.
            </p>
            <a href="{{ route('register') }}" class="cta-button inline-block bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold py-3 px-10 rounded-full text-xl shadow-lg hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-75">
                Daftar Gratis
            </a>
        </div>
    </section>

    <footer class="bg-gray-950 py-8 text-center text-gray-500 text-sm">
        <div class="container mx-auto px-4">
            <p>&copy; {{ date('Y') }} CozyLibrary. All rights reserved.</p>
            <p class="mt-2">Dibuat dengan ❤️ untuk para pecinta buku.</p>
        </div>
    </footer>
</body>
</html>