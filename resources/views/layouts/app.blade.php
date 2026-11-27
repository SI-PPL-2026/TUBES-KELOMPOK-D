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
        /* Profile Dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            min-width: 220px;
            background: #fff;
            border: 1px solid #DEE4DC;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(31,59,46,0.12);
            z-index: 999;
            overflow: hidden;
        }
        .profile-dropdown.open {
            display: block;
            animation: fadeDown 0.18s ease;
        }
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2A6046, #5F6A64);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 15px;
            cursor: pointer;
            border: 2px solid #DEE4DC;
            transition: border-color 0.2s;
            user-select: none;
            flex-shrink: 0;
        }
        .profile-avatar:hover {
            border-color: #2A6046;
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
                <div class="w-10 h-10 rounded-[10px] bg-white flex items-center justify-center shadow-sm flex-shrink-0 group-hover:opacity-90 transition overflow-hidden">
                    <!-- Logo Image -->
                    <img src="{{ asset('images/logo.png') }}" alt="SIDAPUR Logo" class="w-10 h-10 object-contain">
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
            <div class="hidden sm:flex items-center gap-4">
                @auth
                    @php
                        $userRole = Auth::user()->role ?? 'user';
                        $roleLabel = $userRole === 'admin' ? 'Admin Pengurus' : 'Pengguna';
                    @endphp

                    @if($userRole === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-[#EAEFE8] hover:bg-[#DEE4DC] text-[#2A6046] text-[13px] font-bold rounded-[8px] transition flex items-center gap-1.5">
                            <i data-lucide="shield" class="w-4 h-4"></i>
                            <span>Panel Admin</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-[#EAEFE8] hover:bg-[#DEE4DC] text-[#2A6046] text-[13px] font-bold rounded-[8px] transition flex items-center gap-1.5">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            <span>Dashboard Saya</span>
                        </a>
                    @endif

                    {{-- User sudah login: tampilkan avatar + dropdown profil --}}
                    <div class="relative" id="profile-menu-wrapper">
                        {{-- Avatar lingkaran dengan inisial nama --}}
                        <button
                            id="profile-avatar-btn"
                            class="profile-avatar focus:outline-none"
                            aria-haspopup="true"
                            aria-expanded="false"
                            title="{{ Auth::user()->name }}"
                        >
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>

                        {{-- Dropdown Profil --}}
                        <div class="profile-dropdown" id="profile-dropdown" role="menu" aria-label="Menu profil">
                            {{-- Header: avatar besar + info user --}}
                            <div class="flex items-center gap-3 px-4 py-3 bg-[#F4F7F3] border-b border-[#DEE4DC]">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#2A6046] to-[#5F6A64] flex items-center justify-center text-white font-black text-[17px] flex-shrink-0">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[14px] font-bold text-[#1F3B2E] truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-[11px] text-[#5F6A64] truncate">{{ Auth::user()->email }}</p>
                                    <span class="inline-block mt-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-full bg-[#EAEFE8] text-[#2A6046]">
                                        {{ $roleLabel }}
                                    </span>
                                </div>
                            </div>

                            {{-- Menu items sesuai POV --}}
                            <div class="py-1">
                                @if($userRole === 'admin')
                                    <a href="{{ route('admin.dashboard') }}"
                                       class="flex items-center gap-3 px-4 py-2.5 text-[14px] font-semibold text-[#2A6046] hover:bg-[#EAEFE8] transition"
                                       role="menuitem">
                                        <i data-lucide="shield" class="w-4 h-4"></i>
                                        <span>Panel Admin Pengurus</span>
                                    </a>
                                @else
                                    <a href="{{ route('dashboard', ['tab' => 'donations']) }}"
                                       class="flex items-center gap-3 px-4 py-2.5 text-[14px] font-semibold text-[#1F3B2E] hover:bg-[#EAEFE8] hover:text-[#2A6046] transition"
                                       role="menuitem">
                                        <i data-lucide="heart-handshake" class="w-4 h-4 text-[#5F6A64]"></i>
                                        <span>Riwayat Donasi Saya</span>
                                    </a>
                                    <a href="{{ route('dashboard', ['tab' => 'aid']) }}"
                                       class="flex items-center gap-3 px-4 py-2.5 text-[14px] font-semibold text-[#1F3B2E] hover:bg-[#EAEFE8] hover:text-[#2A6046] transition"
                                       role="menuitem">
                                        <i data-lucide="clipboard-list" class="w-4 h-4 text-[#5F6A64]"></i>
                                        <span>Pengajuan Bantuan Saya</span>
                                    </a>
                                @endif

                                <a href="{{ route('profile.edit') }}"
                                   class="flex items-center gap-3 px-4 py-2.5 text-[14px] font-semibold text-[#1F3B2E] hover:bg-[#EAEFE8] hover:text-[#2A6046] transition"
                                   role="menuitem">
                                    <i data-lucide="user" class="w-4 h-4 text-[#5F6A64]"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </div>

                            {{-- Logout --}}
                            <div class="border-t border-[#DEE4DC] py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-center gap-3 px-4 py-2.5 text-[14px] font-semibold text-red-600 hover:bg-red-50 transition"
                                            role="menuitem">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Belum login: tampilkan tombol Masuk & Daftar --}}
                    <a href="{{ route('login') }}" class="text-[15px] font-bold text-[#2A6046] hover:text-[#1F3B2E] transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-[22px] py-[12px] bg-[#2A6046] hover:bg-[#1F3B2E] text-white text-[15px] font-bold rounded-[8px] transition shadow-sm">
                        Daftar
                    </a>
                @endauth
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
                @auth
                    {{-- User sudah login: tampilkan info profil di mobile --}}
                    <div class="flex items-center gap-3 mt-2 p-3 bg-[#F4F7F3] rounded-xl">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#2A6046] to-[#5F6A64] flex items-center justify-center text-white font-black text-[15px] flex-shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-[13px] font-bold text-[#1F3B2E] truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-[#5F6A64] truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 py-2 text-sm font-semibold text-[#1F3B2E] hover:text-[#2A6046] transition">
                        <i data-lucide="user" class="w-4 h-4"></i> Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 py-2 text-sm font-semibold text-red-600 hover:text-red-800 transition w-full">
                            <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                        </button>
                    </form>
                @else
                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-[#2A6046]">Masuk ke Akun</a>
                        <a href="{{ route('register') }}" class="text-sm font-bold text-[#5F6A64]">Belum punya akun?</a>
                    </div>
                @endauth
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
                            <!-- Bag + Heart Logo -->
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 7.5 C7.5 5.5 6.5 2.5 8.5 2 C10 1.7 10.8 4.5 12 6.5 C13.2 4.5 14 1.7 15.5 2 C17.5 2.5 16.5 5.5 15.5 7.5 C18.5 8 21 10.5 21 14 C21 18.5 17 22 12 22 C7 22 3 18.5 3 14 C3 10.5 5.5 8 8.5 7.5 Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                                <path d="M12 18.5 C12 18.5 7.5 15 7.5 11.5 C7.5 9.5 9 8.5 10.5 8.5 C11.3 8.5 12 9.3 12 9.3 C12 9.3 12.7 8.5 13.5 8.5 C15 8.5 16.5 9.5 16.5 11.5 C16.5 15 12 18.5 12 18.5 Z" stroke="#86efac" stroke-width="1.5" stroke-linejoin="round"/>
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

        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Profile dropdown toggle
        const avatarBtn = document.getElementById('profile-avatar-btn');
        const profileDropdown = document.getElementById('profile-dropdown');
        if (avatarBtn && profileDropdown) {
            avatarBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = profileDropdown.classList.toggle('open');
                avatarBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });

            // Tutup dropdown jika klik di luar
            document.addEventListener('click', (e) => {
                if (!document.getElementById('profile-menu-wrapper').contains(e.target)) {
                    profileDropdown.classList.remove('open');
                    avatarBtn.setAttribute('aria-expanded', 'false');
                }
            });

            // Tutup dropdown saat tekan Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    profileDropdown.classList.remove('open');
                    avatarBtn.setAttribute('aria-expanded', 'false');
                    avatarBtn.focus();
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
