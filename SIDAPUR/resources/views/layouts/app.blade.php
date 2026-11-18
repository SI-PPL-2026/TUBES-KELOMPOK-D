<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIDAPUR - Kebaikan dalam Seporsi Nasi')</title>

    <!-- Google Fonts: Lato (Figma Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Lato', 'sans-serif'],
                        lato: ['Lato', 'sans-serif'],
                    },
                    colors: {
                        sidapur: {
                            50: '#F4F7F3',
                            100: '#EAEFE8',
                            200: '#DEE4DC',
                            300: '#BAC7B6',
                            400: '#5F6A64',
                            500: '#2A6046', // Primary Figma Green
                            600: '#23503B',
                            700: '#1F3B2E', // Dark Title Color
                            800: '#172C22',
                            900: '#0E1A14',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Lato', sans-serif;
            color: #1F3B2E;
            background-color: #FFFFFF;
        }
        .active-nav-link {
            color: #2A6046 !important;
            font-weight: 700;
            border-bottom: 2px solid #2A6046;
            padding-bottom: 4px;
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-sidapur-100 selection:text-sidapur-700">

    <!-- Navigasi Utama (Figma 1:1) -->
    <header class="w-full bg-white border-b border-[#DEE4DC] sticky top-0 z-50">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 h-[88px] flex items-center justify-between">
            
            <!-- Identitas / Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-[10px] bg-[#2A6046] flex items-center justify-center text-white shadow-sm flex-shrink-0 group-hover:bg-[#23503B] transition">
                    <!-- Rice Bowl / Soup SVG Icon -->
                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v2"></path>
                        <path d="M7 3v2"></path>
                        <path d="M17 3v2"></path>
                        <path d="M2 10h20a10 10 0 0 1-20 0z"></path>
                        <path d="M6 19h12"></path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-[22px] font-black leading-[24px] tracking-tight text-[#1F3B2E]">SIDAPUR</span>
                    <span class="text-[9px] font-medium tracking-[0.36px] text-[#5F6A64] uppercase">KEBAIKAN DALAM SEPORSI NASI</span>
                </div>
            </a>

            <!-- Menu Navigasi Desktop -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-[15px] font-medium transition hover:text-[#2A6046] {{ request()->routeIs('home*') ? 'active-nav-link' : 'text-[#2B3A33]' }}">
                    Beranda
                </a>
                <a href="{{ route('about') }}" class="text-[15px] font-medium transition hover:text-[#2A6046] {{ request()->routeIs('about*') ? 'active-nav-link' : 'text-[#2B3A33]' }}">
                    Tentang kami
                </a>
                <a href="{{ route('transparency') }}" class="text-[15px] font-medium transition hover:text-[#2A6046] {{ request()->routeIs('transparency*') ? 'active-nav-link' : 'text-[#2B3A33]' }}">
                    Transparansi
                </a>
                <a href="{{ route('contact') }}" class="text-[15px] font-medium transition hover:text-[#2A6046] {{ request()->routeIs('contact*') ? 'active-nav-link' : 'text-[#2B3A33]' }}">
                    Hubungi kami
                </a>
            </nav>

            <!-- Akses Akun & Tombol Aksi -->
            <div class="hidden sm:flex items-center gap-5">
                <a href="{{ route('login') }}" class="text-[15px] font-bold text-[#2A6046] hover:text-[#1F3B2E] transition">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="px-[22px] py-[12px] bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-[8px] transition shadow-sm">
                    Daftar
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-[#1F3B2E] hover:bg-[#EAEFE8]" aria-label="Toggle Menu">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-[#DEE4DC] bg-white px-4 pt-3 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block py-2 text-[15px] font-semibold {{ request()->routeIs('home*') ? 'text-[#2A6046]' : 'text-[#2B3A33]' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" class="block py-2 text-[15px] font-semibold {{ request()->routeIs('about*') ? 'text-[#2A6046]' : 'text-[#2B3A33]' }}">
                Tentang kami
            </a>
            <a href="{{ route('transparency') }}" class="block py-2 text-[15px] font-semibold {{ request()->routeIs('transparency*') ? 'text-[#2A6046]' : 'text-[#2B3A33]' }}">
                Transparansi
            </a>
            <a href="{{ route('contact') }}" class="block py-2 text-[15px] font-semibold {{ request()->routeIs('contact*') ? 'text-[#2A6046]' : 'text-[#2B3A33]' }}">
                Hubungi kami
            </a>
            <div class="pt-3 border-t border-[#DEE4DC] flex flex-col gap-2">
                <a href="{{ route('aid.create') }}" class="w-full text-center py-2.5 bg-[#2A6046] text-white font-bold rounded-lg text-sm">
                    Ajukan Bantuan
                </a>
                <a href="{{ route('donation.create') }}" class="w-full text-center py-2.5 border border-[#2A6046] text-[#2A6046] font-bold rounded-lg text-sm">
                    Bantu Donasi
                </a>
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-[#2A6046]">Masuk ke Akun</a>
                    <a href="{{ route('register') }}" class="text-sm font-bold text-[#5F6A64]">Belum punya akun?</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Alert Messages -->
    @if(session('success'))
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
            <div class="p-4 bg-[#EAEFE8] border border-[#2A6046]/40 rounded-xl flex items-center gap-3 text-[#1F3B2E]">
                <i data-lucide="check-circle" class="w-5 h-5 text-[#2A6046] flex-shrink-0"></i>
                <span class="text-sm font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
            <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl flex items-center gap-3 text-blue-900">
                <i data-lucide="info" class="w-5 h-5 text-blue-600 flex-shrink-0"></i>
                <span class="text-sm font-semibold">{{ session('info') }}</span>
            </div>
        </div>
    @endif

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer (Figma 1:1) -->
    <footer class="w-full bg-white border-t border-[#DEE4DC] pt-14 pb-8">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b border-[#DEE4DC]">
                
                <!-- Identitas Program -->
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-[10px] bg-[#2A6046] flex items-center justify-center text-white shadow-sm flex-shrink-0">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v2"></path>
                                <path d="M7 3v2"></path>
                                <path d="M17 3v2"></path>
                                <path d="M2 10h20a10 10 0 0 1-20 0z"></path>
                                <path d="M6 19h12"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[22px] font-black leading-[24px] tracking-tight text-[#1F3B2E]">SIDAPUR</span>
                            <span class="text-[9px] font-medium tracking-[0.36px] text-[#5F6A64] uppercase">KEBAIKAN DALAM SEPORSI NASI</span>
                        </div>
                    </div>
                    <p class="text-[14px] leading-relaxed text-[#5F6A64] max-w-sm">
                        Seporsi makanan, sebuah kepedulian. Ruang bersama untuk menghadirkan harapan melalui makanan layak bagi mahasiswa dan perantau di Purbalingga & Purwokerto.
                    </p>
                    <div>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-3.5 py-2 bg-[#EAEFE8] hover:bg-[#DEE4DC] text-[#2A6046] text-xs font-bold rounded-lg transition">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                            <span>Instagram Nasi Darurat ↗</span>
                        </a>
                    </div>
                </div>

                <!-- Tautan Menu Kolom 1 -->
                <div class="md:col-span-2 space-y-3">
                    <p class="text-[15px] font-bold text-[#1F3B2E]">Jelajahi</p>
                    <ul class="space-y-2 text-[14px] text-[#5F6A64]">
                        <li><a href="{{ route('home') }}" class="hover:text-[#2A6046] transition">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#2A6046] transition">Tentang Kami</a></li>
                        <li><a href="{{ route('transparency') }}" class="hover:text-[#2A6046] transition">Transparansi Kas</a></li>
                        <li><a href="{{ route('aid.create') }}" class="hover:text-[#2A6046] transition">Ajukan Bantuan</a></li>
                    </ul>
                </div>

                <!-- Tautan Menu Kolom 2 -->
                <div class="md:col-span-2 space-y-3">
                    <p class="text-[15px] font-bold text-[#1F3B2E]">Terlibat</p>
                    <ul class="space-y-2 text-[14px] text-[#5F6A64]">
                        <li><a href="{{ route('donation.create') }}" class="hover:text-[#2A6046] transition">Jadi Donatur</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#2A6046] transition">Kolaborasi Dapur</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#2A6046] transition">Gabung Relawan</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#2A6046] transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Informasi Wilayah -->
                <div class="md:col-span-3 space-y-3">
                    <p class="text-[15px] font-bold text-[#1F3B2E]">Wilayah Layanan</p>
                    <p class="text-[13px] leading-relaxed text-[#5F6A64]">
                        Kabupaten Purbalingga & Kabupaten Banyumas (Purwokerto), Jawa Tengah. Melayani 10+ perguruan tinggi dan mahasiswa perantau.
                    </p>
                    <div class="pt-1 flex items-center gap-2 text-xs font-semibold text-[#2A6046]">
                        <i data-lucide="shield-check" class="w-4 h-4 text-[#2A6046]"></i>
                        <span>Penyaluran Terverifikasi & Terbuka</span>
                    </div>
                </div>

            </div>

            <!-- Catatan Kaki Bawah -->
            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-[#5F6A64]">
                <p>© 2026 SIDAPUR (Nasi Darurat Purbalingga & Purwokerto). Kebaikan dalam seporsi nasi.</p>
                <p>Tugas Besar Proyek Perangkat Lunak • Kelompok 4</p>
            </div>
        </div>
    </footer>

    <!-- Init Lucide Icons & Mobile Menu JS -->
    <script>
        lucide.createIcons();
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
