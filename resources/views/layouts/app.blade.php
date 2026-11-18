<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIDAPUR - Bantuan Nasi Darurat Purbalingga & Purwokerto')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316', // Main warm orange
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                        navy: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen antialiased">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-brand-600 to-amber-600 text-white text-xs sm:text-sm py-2 px-4 text-center font-medium shadow-sm">
        <span>🍲 Gerakan Berbagi untuk Mahasiswa & Anak Kos di Purbalingga & Purwokerto</span>
        <span class="mx-2 hidden md:inline">•</span>
        <span class="hidden md:inline">Mendukung SDGs 2 (Zero Hunger)</span>
    </div>

    <!-- Navigation Header -->
    <header x-data="{ mobileMenuOpen: false }" class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-brand-500 to-amber-400 flex items-center justify-center text-white text-xl shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bowl-rice"></i>
                    </div>
                    <div>
                        <div class="text-xl font-extrabold tracking-tight text-slate-900 group-hover:text-brand-600 transition-colors">
                            SIDAPUR
                        </div>
                        <div class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            Nasi Darurat Purbalingga-Purwokerto
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-7 text-sm font-semibold text-slate-600">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Tentang</a>
                    <a href="{{ route('transparency') }}" class="{{ request()->routeIs('transparency') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Transparansi</a>
                    <a href="{{ route('documentations.index') }}" class="{{ request()->routeIs('documentations.*') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Dokumentasi</a>
                    <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Artikel</a>
                    <a href="{{ route('collaboration') }}" class="{{ request()->routeIs('collaboration') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Kolaborasi</a>
                    <a href="{{ route('reviews.index') }}" class="{{ request()->routeIs('reviews.*') ? 'text-brand-600 font-bold' : 'hover:text-brand-600 transition-colors' }}">Ulasan</a>
                </nav>

                <!-- Action Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <!-- Language Indicator -->
                    <div class="flex items-center text-xs font-semibold px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 border border-slate-200">
                        <span class="text-brand-600 font-bold">ID</span>
                        <span class="mx-1 text-slate-300">/</span>
                        <span class="text-slate-400">EN</span>
                    </div>

                    @auth
                        <!-- User Menu Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-2 text-sm font-semibold bg-slate-100 hover:bg-slate-200 text-slate-800 px-3.5 py-2 rounded-xl transition-colors">
                                <i class="fa-solid fa-circle-user text-brand-500 text-lg"></i>
                                <span>{{ Str::limit(Auth::user()->name, 14) }}</span>
                                <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                            </button>

                            <div x-show="open" @click.away="open = false" x-cloak
                                 class="absolute right-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50">
                                <div class="px-4 py-2 border-b border-slate-100 text-xs text-slate-500">
                                    Masuk sebagai: <strong class="text-slate-700 capitalize">{{ Auth::user()->role }}</strong>
                                </div>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-gauge mr-2.5 w-4 text-center"></i> Dashboard Admin
                                    </a>
                                @elseif(Auth::user()->isDonatur())
                                    <a href="{{ route('donatur.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-heart mr-2.5 w-4 text-center"></i> Dashboard Donatur
                                    </a>
                                    <a href="{{ route('donatur.create') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-hand-holding-dollar mr-2.5 w-4 text-center"></i> Titip Donasi
                                    </a>
                                    <a href="{{ route('donatur.profile') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-id-badge mr-2.5 w-4 text-center"></i> Profil Saya
                                    </a>
                                @else
                                    <a href="{{ route('penerima.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-bowl-food mr-2.5 w-4 text-center"></i> Status Bantuan
                                    </a>
                                    <a href="{{ route('penerima.create') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-plus-circle mr-2.5 w-4 text-center"></i> Ajukan Bantuan
                                    </a>
                                    <a href="{{ route('penerima.profile') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-600">
                                        <i class="fa-solid fa-id-card mr-2.5 w-4 text-center"></i> Profil & KTM
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100 mt-1 pt-1">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-sm text-rose-600 hover:bg-rose-50">
                                        <i class="fa-solid fa-arrow-right-from-bracket mr-2.5 w-4 text-center"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-brand-600 px-3.5 py-2 rounded-xl transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register', ['role' => 'donatur']) }}" class="text-sm font-semibold bg-brand-500 hover:bg-brand-600 text-white px-5 py-2.5 rounded-xl shadow-md shadow-brand-500/20 hover:shadow-lg transition-all flex items-center space-x-1.5">
                            <i class="fa-solid fa-heart"></i>
                            <span>Donasi</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center lg:hidden space-x-2">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-600 hover:text-slate-900 p-2 rounded-lg">
                        <i :class="mobileMenuOpen ? 'fa-solid fa-xmark text-xl' : 'fa-solid fa-bars text-xl'"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Beranda</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Tentang</a>
            <a href="{{ route('transparency') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Transparansi</a>
            <a href="{{ route('documentations.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Dokumentasi</a>
            <a href="{{ route('articles.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Artikel</a>
            <a href="{{ route('collaboration') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Kolaborasi</a>
            <a href="{{ route('reviews.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100">Ulasan</a>

            <div class="pt-3 border-t border-slate-200 flex flex-col space-y-2">
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="w-full text-center py-2.5 bg-slate-800 text-white font-semibold rounded-xl">Dashboard Admin</a>
                    @elseif(Auth::user()->isDonatur())
                        <a href="{{ route('donatur.dashboard') }}" class="w-full text-center py-2.5 bg-brand-500 text-white font-semibold rounded-xl">Dashboard Donatur</a>
                    @else
                        <a href="{{ route('penerima.dashboard') }}" class="w-full text-center py-2.5 bg-emerald-600 text-white font-semibold rounded-xl">Dashboard Penerima</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-center py-2.5 bg-slate-100 text-rose-600 font-semibold rounded-xl">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center py-2.5 bg-brand-500 text-white font-semibold rounded-xl">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Flash Alerts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        @if(session('success'))
            <div class="flex items-center p-4 mb-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 rounded-r-xl shadow-xs">
                <i class="fa-solid fa-circle-check text-lg mr-3 text-emerald-600"></i>
                <div class="text-sm font-medium">{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center p-4 mb-4 text-rose-800 border-l-4 border-rose-500 bg-rose-50 rounded-r-xl shadow-xs">
                <i class="fa-solid fa-circle-exclamation text-lg mr-3 text-rose-600"></i>
                <div class="text-sm font-medium">{{ session('error') }}</div>
            </div>
        @endif

        @if(session('warning'))
            <div class="flex items-center p-4 mb-4 text-amber-800 border-l-4 border-amber-500 bg-amber-50 rounded-r-xl shadow-xs">
                <i class="fa-solid fa-triangle-exclamation text-lg mr-3 text-amber-600"></i>
                <div class="text-sm font-medium">{{ session('warning') }}</div>
            </div>
        @endif

        @if(session('info'))
            <div class="flex items-center p-4 mb-4 text-sky-800 border-l-4 border-sky-500 bg-sky-50 rounded-r-xl shadow-xs">
                <i class="fa-solid fa-circle-info text-lg mr-3 text-sky-600"></i>
                <div class="text-sm font-medium">{{ session('info') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 mb-4 text-rose-800 border-l-4 border-rose-500 bg-rose-50 rounded-r-xl shadow-xs">
                <div class="font-semibold text-sm flex items-center mb-1">
                    <i class="fa-solid fa-circle-xmark mr-2 text-rose-600"></i> Terdapat beberapa kesalahan pengisian form:
                </div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Main Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-2xl bg-brand-500 flex items-center justify-center text-white text-lg shadow-md">
                            <i class="fa-solid fa-bowl-rice"></i>
                        </div>
                        <span class="text-2xl font-extrabold text-white tracking-tight">SIDAPUR</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Sistem Informasi Pengelolaan Bantuan Nasi Darurat Purbalingga dan Purwokerto. Gerakan kerelawanan pangan gratis untuk mahasiswa perantau dan anak kos yang sedang kehabisan uang saku.
                    </p>
                    <div class="flex items-center space-x-4 pt-2">
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-500 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://tiktok.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-500 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="https://wa.me" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-brand-500 text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Navigasi -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Navigasi</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-brand-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition-colors">Tentang Program</a></li>
                        <li><a href="{{ route('transparency') }}" class="hover:text-brand-400 transition-colors">Transparansi Dana</a></li>
                        <li><a href="{{ route('documentations.index') }}" class="hover:text-brand-400 transition-colors">Dokumentasi Penyaluran</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-brand-400 transition-colors">Kabar & Artikel</a></li>
                    </ul>
                </div>

                <!-- Col 3: Layanan & Bantuan -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Layanan</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('register', ['role' => 'penerima']) }}" class="hover:text-brand-400 transition-colors">Pengajuan Bantuan Darurat</a></li>
                        <li><a href="{{ route('register', ['role' => 'donatur']) }}" class="hover:text-brand-400 transition-colors">Titip Donasi</a></li>
                        <li><a href="{{ route('collaboration') }}" class="hover:text-brand-400 transition-colors">Mitra Warung Makan</a></li>
                        <li><a href="{{ route('reviews.index') }}" class="hover:text-brand-400 transition-colors">Ulasan Komunitas</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kebijakan & Kontak -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Legalitas & Info</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('terms') }}" class="hover:text-brand-400 transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-brand-400 transition-colors">Kebijakan Privasi (KTM)</a></li>
                        <li><span class="text-slate-400 text-xs block mt-2">Area Layanan: Purbalingga & Purwokerto, Jawa Tengah</span></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} SIDAPUR - Nasi Darurat Purbalingga & Purwokerto. Tugas Besar Rekayasa Perangkat Lunak.</p>
                <p class="mt-2 md:mt-0">Dikelola dengan ❤️ untuk kemanusiaan & kepedulian sesama mahasiswa.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
